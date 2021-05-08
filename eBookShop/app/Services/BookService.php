<?php


namespace App\Services;

use App\Contracts\BookContract;
use App\Models\Book;
use App\Models\ImageBook;

class BookService implements BookContract
{

    public function getAll()
    {
      $books =  Book::all();
      return $books;
    }

    public function show($id)
    {

    }

    public function create($request)
    {
        $input =$request->all();
          unset($input['inputfile']);
        $book = Book::create($input);
        foreach ($request->file('inputfile')  as $file){
                $name = time() . $file->getClientOriginalName();
                $file->move('imagesBook', $name);
                 ImageBook::create(['file' => $name,'book_id'=>$book->id]);
        }
        return "Create success!";
    }

    public function update($request, $id)
    {

    }

    public function delete($id)
    {

    }

    public function edit($id)
    {

    }
}
