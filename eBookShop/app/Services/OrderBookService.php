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
     public function orderAccept($id){

         $order = $this->order::findOrFail($id);
         $order->active =1;
         return $order->save();
     }
     public function  getOrderByActive($active){
         return  $this->order->where('active', '=', $active)->get();
     }


     public function orderShow($id, $customer)
     {
            $orderView =new showOrderModels();
           $order =  Order::findOrFail($id);
           $booksOrder =$order->books;
           $user = User::findOrFail($customer);
           $totalPrice =0;
           foreach ($booksOrder as $item){
                     $bookModel = new bookViewModels();
               $price =$item->price;
               $bookModel->setId($item->id);
               $bookModel->setTitle($item->title);
               $bookModel->setImages($item->imagebooks[0]->file);
               $bookModel->setPrice($price);
                foreach ($item->orders as $amount){
                    $bookModel->setAmount($amount->pivot->amount);
                         $totalPrice += ($price * $amount->pivot->amount);
               }
                $orderView->setListBookViewModel($bookModel);
                $orderView->setTotalPrice($totalPrice);
           }
           $orderView->setId($id);
           $orderView->setName($user->userName);
          $orderView->setFullName($user->full_name);
          $orderView->setAddress($user->address);
          $orderView->setEmail($user->email);
         $orderView->setPhoneNumber($user->phoneNumber);
          $orderView->setCity($order->city);
          $orderView->setCountry($order->country);
          $orderView->setStatus($order->status);
           // $bookOrders[2]->orders[0]->pivot->amount;
         return $orderView;
     }
 }
