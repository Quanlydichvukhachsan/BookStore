<?php


namespace App\Services;


use App\Contracts\AuthorContract;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AuthorService implements AuthorContract
{
    public function getAll()
    {
        $author= Author::all()->each->fullname;
        return $author;
    }

    public function create($request)
    {
         Author::create([
            'firstName' =>$request->input('add-firstname-author'),
            'lastName' =>$request->input('add-lastname-author')
        ]);
    }
    public function update($Request)
    {
        $input = $Request->all();
        $firstName = $input['firstname_edit_author'];
        $lastName = $input['lastname_edit_author'];
        $id = $input['idAuthor'];
        $author = Author::findOrFail($id);
        $author->firstName = $firstName;
        $author->lastName = $lastName;
        $author->save();
        $result= "Cập nhật thành công";
        return $result;
    }
    public function delete($Request)
    {
        $ids = $Request['idAuthor'];
        $result = array('error' => 'error', 'success' => 'success');
        Author::destroy($ids);
        return $result['success'];
    }
    public function showBook($id)
    {

        $author = Author::findOrFail($id);
        $books = $author->books;
//        foreach ($books as $book) {
//
////            $fullname= $book->author->fullname;
//
//        }

        return $books;

    }
}
