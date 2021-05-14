<?php namespace App\Services;
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

            return $this->order::findOrFail($id);
    }


    public function create(OrderBookRequestModels $order){
                return $this->order::create($order);
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
}
