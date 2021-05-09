<?php

namespace App\Http\Controllers;

use App\Contracts\BookContract;
use App\Http\Requests\CreateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $BookStore;

    public function __construct(BookContract $BookStore){
         $this->BookStore = $BookStore;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $books =   $this->BookStore->getAll();
        return  view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $result =  $this->BookStore->create($request);
        $request->session()->flash('create-book',$result);
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $book = $this->BookStore->show($id);
         return view('admin.book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = $this->BookStore->edit($id);
        return view('admin.book.edit',['book'=>$result[0],'authors'=>$result[1],'publishers'=>$result[2],'categories'=>$result[3]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage(Request $request,$id){
           dd($request->all());
    }
}
