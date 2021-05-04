<?php


namespace App\Services;


use App\Contracts\AuthorContract;
use App\Models\Author;

class AuthorService implements AuthorContract
{
    public function getAll()
    {
        $author= Author::all();
        return $author;

    }

    public function create($request)
    {

    }
    public function update($Request, $id)
    {
        // TODO: Implement update() method.
    }
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
