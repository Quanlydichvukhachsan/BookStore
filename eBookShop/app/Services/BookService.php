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
        foreach ($request->input('inputfile') as $file){
                $name = time() . $file;
                $file->move('imagesBook', $name);
                 ImageBook::create(['file' => $name]);
        }
        unset($input['inputfile']);
         Book::create($input);
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
