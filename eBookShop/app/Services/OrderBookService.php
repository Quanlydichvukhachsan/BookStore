<?php namespace App\Services;
use App\Models\Order;
use App\Contracts\OrderContract;
use App\viewModels\OrderBookRequest;
 class OrderBookService implements OrderContract{


    public function getAll(){
        $orders = Order::orderBy('created_at', 'desc')->get();
        return $orders;
    }

    public function show($id){

            return $this->order::findOrFail($id);
    }


    public function create(OrderBookRequest $order){
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
           $bookOrders =  Order::findOrFail($id)->books;
           return $bookOrders[2]->orders[0]->pivot->amount;
     }
 }
