<?php

namespace App\Http\Controllers;

use App\Contracts\OrderContract;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private  $orderBook;
    public function __construct(OrderContract $orderBook)
    {
        $this->orderBook =$orderBook;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('app.cart');
    }

    public function checkout(){
        return view('app.checkout');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function order(CreateOrderRequest $request,$id){

       $result = $this->orderBook->create($request,$id);
          return response()->json(["result"=>$result]);
    }
    /**
     * Display the specified resource.
     * @param  int  $customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function salesOrder($id){
          $user = User::findOrFail($id);
       $items = $user->orders;
        return view('app.salesOrderHistory',compact('items'));
    }
    /**
     * Display the specified resource.
     * @param  int  $customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function salesOrderDetail($id, int $customer){
        $item =   $this->orderBook->orderShow($id,$customer);
      return view('app.salesOrderDetail',compact('item'));
    }
    /**
     * Display the specified resource.
     * @param \Illuminate\Http\Request $request
     * @param  int  $customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateSalesOrderDetail(UpdateSalesOrderRequest $request , $id, int $customer){
            $result =  $this->orderBook->updateSalesOrderDetail($request,$id,$customer);
        return response()->json(["result"=>$result]);
    }

}
