<?php

namespace App\Http\Controllers;

use App\Contracts\HomeContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private  $homeContract;
    public function __construct(HomeContract $homeContract)
    {
             $this->homeContract =$homeContract;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products =  $this->homeContract->getAll();
      // dd($products);
        return view('app.home',compact('products'));
    }
}
