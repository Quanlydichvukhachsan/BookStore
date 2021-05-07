<?php


namespace App\Services;

use App\Contracts\BookContract;
use App\Models\Book;

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
