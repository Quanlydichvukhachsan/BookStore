<?php


namespace App\Services;

use App\Contracts\BookContract;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\ImageBook;
use App\Models\Publisher;


class BookService implements BookContract
{

    public function getAll()
    {
      $books =  Book::all();
      return $books;
    }

    public function show($id)
    {
         $book =  Book::findOrFail($id);
         return $book;
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
        $result = array();
        $book =  Book::findOrFail($id);
        array_push($result,$book);
        $author =   Author::all();
        array_push($result,$author);
        $publisher = Publisher::all();
        array_push($result,$publisher);
        $categories = Category::all();
        array_push($result,$categories);
        return $result ;
    }
}
