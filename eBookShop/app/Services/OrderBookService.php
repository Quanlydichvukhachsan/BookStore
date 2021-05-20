<?php namespace App\Services;
use App\Events\OrderNotification;
use App\Models\Order;
use App\Contracts\OrderContract;
use App\Models\User;
use App\viewModels\bookViewModels;
use App\viewModels\OrderBookRequestModels;
use App\viewModels\showOrderModels;

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
}
