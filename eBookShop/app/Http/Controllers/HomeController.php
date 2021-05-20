<?php

namespace App\Http\Controllers;

use App\Contracts\HomeContract;
use App\Models\Category;
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
        return view('app.overview',compact('products'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param string $name
     * @return \Illuminate\Http\Response
     */
    public function getByCategory(Request $request,$name,$id)
    {
        global $products;
        if ($request->ajax()) {
            global $products;
            if ($request->has('sort')) {
                $key = $request->input('sort');
                $products = $this->homeContract->sortPriceById($name, $id, $key);
            } elseif ($request->has('sortname')) {

                $key = $request->input('sortname');
                $products = $this->homeContract->sortNameById($name, $id, $key);
            } elseif ($request->has('sortFormality')) {

                $key = $request->input('sortFormality');
                $products = $this->homeContract->sortFormalityById($name, $id, $key);

            } else {

                $products = $this->homeContract->getByProductByCategory($name, $id);

            }

            return response()->json($products);
        } else {

            if ($request->has('sort')) {
                $key = $request->input('sort');

                $products = $this->homeContract->getByCategory($name, $id, $key);
            } elseif ($request->has('sortname')) {
                $key = $request->input('sortname');
                $products = $this->homeContract->getByCategory($name, $id, $key);
            } elseif ('sortFormality') {
                $key = $request->input('sortFormality');

                $products = $this->homeContract->getByCategory($name, $id, $key);
            } else {
                $products = $this->homeContract->getByCategory($name, $id, "");
            }

        }
        return view('app.product', compact('products'));
    }
        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @param string $name
         * @return \Illuminate\Http\Response
         */
        public function getProduct(string $name,$id)
       {
           $products =  $this->homeContract->getAll();
           return view('app.productDetail',compact('products'));
       }


}
