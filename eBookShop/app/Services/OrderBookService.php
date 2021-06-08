<?php namespace App\Services;
use App\Events\OrderNotification;
use App\Models\Order;
use App\Contracts\OrderContract;
use App\Models\User;
use App\viewModels\bookViewModels;
use App\viewModels\OrderBookRequestModels;
use App\viewModels\showOrderModels;
use http\Env\Request;

class OrderBookService implements OrderContract{


    public function getAll(){
        $orders = Order::orderBy('created_at', 'desc')->get();
        return $orders;
    }

    public function show($id){


    }


    public function create($request,$id){
          $input = $request->all();
         $user = User::findOrFail($id);
           if(!count($user->getRoleNames())){
                    $user->address = $input['address'];
               $user->phoneNumber = $input['phoneNumber'];
               $user->save();
           }
            $order = Order::create(['user_id'=>$id,'city'=>$input['city'],'country'=>$input['national'],'district'=>$input['district'],
                 'note'=>$input['message'],'totalPrice'=>$input['totalPrice'],
                'totalPriceFee'=>$input['totalPriceOrder'],
                 'nameReceive'=>$input['name'],'quantity'=>$input['quantity']]);
           foreach ($input['book']as $item){
               $order->books()->attach($item['id'],array('amount'=>$item['no']));
           }

           event(new OrderNotification($user,$order));

           return "Đặt hàng thành công!";

    }

     public function orderShow($id, $customer)
     {
            $orderView =new showOrderModels();
           $order =  Order::findOrFail($id);
           $booksOrder =$order->books;
           $user = User::findOrFail($customer);
           foreach ($booksOrder as $item){
               $totalPrice =0;
                     $bookModel = new bookViewModels();
               $price =$item->price;
               $bookModel->setId($item->id);
               $bookModel->setTitle($item->title);
               $bookModel->setImages($item->imagebooks[0]->file);
               $bookModel->setPrice($price);
               $bookModel->setAmount($item->pivot->amount);
               $totalPrice += ($bookModel->getPrice() * $bookModel->getAmount());
                $orderView->setListBookViewModel($bookModel);
                $orderView->setTotalPrice(number_format($totalPrice, 3));
           }
           $orderView->setId($id);
         $orderView->setUserId($user->id);
           $orderView->setName($user->userName);
          $orderView->setFullName($user->full_name);
          $orderView->setAddress($user->address);
          $orderView->setEmail($user->email);
         $orderView->setPhoneNumber($user->phoneNumber);
          $orderView->setCity($order->city);
          $orderView->setCountry($order->country);
          $orderView->setStatus($order->status);
         $orderView->setDistrict($order->district);
         $orderView->setTotalPriceFee($order->totalPriceFee);
         return $orderView;
     }

    public function update($request, $id)
    {
       $order = Order::findOrFail($id);
       if($request['status'] !==null){
           $order->status =$request['status'];
           $order->save();
       }else{
           return "No changed";
       }
       return "Update date success";

    }
    public function destroy($id)
    {
       $order =  Order::findOrFail($id);
      global $message ;
       if($order->status === "Cancel"){
           $booksOrder =$order->books;
           foreach ($booksOrder as $item){
               $order->books()->detach($item->id);
           }
               $order->delete();
               $message ="Delete success!";
       }else{
           $message ="Cannot delete!";
           return $message;
       }
       return $message;

    }

    public function updateSalesOrderDetail($request, $id, $customer)
    {
        $input = $request->all();
        $user =  User::findOrFail($customer);
        if(!count($user->getRoleNames())){
            $user->address = $input['address'];
            $user->phoneNumber = $input['phoneNumber'];
            $user->save();
        }
        $order =  Order::findOrFail($id);
        $order->city =$input['city'];
        $order->nameReceive =$input['nameReceive'];
        $order->district =$input['district'];
        $order->country =$input['country'];
        $order->save();
        return "Cập nhật đơn hàng thành công!";

    }
       public function quickRandom($length = 16)
        {
    $pool = 'abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ0123456789';
 $str='';
 $size = strlen($pool);
   for($i =0;$i<$length;$i++){
           $str .= $pool[rand(0,$size-1)];

   }

    return $str;
        }
    function createPayment($request){

        $vnp_TxnRef = $this->quickRandom(16); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = "billpayment";
        $vnp_Amount =str_replace(',', '',$request->totalPriceOrder) * 100;
        $vnp_Locale ="vn";
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" =>env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );
      //  dd($inputData);

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
       // dd($vnp_Url);
        return redirect($vnp_Url);
    }
}
