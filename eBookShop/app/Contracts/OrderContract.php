<?php namespace App\Contracts;
use App\viewModels\OrderBookRequestModels;

interface OrderContract{
    public function getAll();
    public function show($id);
    public function create(OrderBookRequestModels $orderBookRequest);
    public function orderAccept($id);
    public  function getOrderByActive($active);
   public function orderShow($id,$customer);
}
