<?php

namespace App\Http\Controllers;

use App\Contracts\OrderContract;
use App\Http\Requests\CreateOrderRequest;
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
       //  $input = $request->all();
       // $result  =$input['book'][0]['no'];
          return response()->json(["result"=>$result]);
    }


}
