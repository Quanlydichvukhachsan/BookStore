<?php


namespace App\Services;


use App\Contracts\AuthorContract;
use App\Models\Author;

class AuthorService implements AuthorContract
{
    public function getAll()
    {
        $author= Author::all()->each->fullname;
        return $author;
    }

    public function create($request)
    {
//        $result = $request->all();
        Author::create([
            'firstName' =>$request->input('add-firstname-author'),
            'lastName' =>$request->input('add-lastname-author')
        ]);

    }
    public function update($Request, $id)
    {
        // TODO: Implement update() method.
    }
    public function delete($id)
    {

    }
}
