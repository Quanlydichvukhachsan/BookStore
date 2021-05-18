<?php namespace App\Contracts;
use App\viewModels\OrderBookRequestModels;

interface OrderContract{
    public function getAll();
    public function show($id);
    public function update($request,$id);
    public function create($request,$id);
   public function orderShow($id,$customer);
   public function destroy($id);
}
