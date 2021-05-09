<?php


namespace App\Services;

use App\Contracts\PublisherContract;
use App\Models\Publisher;

class PublisherService implements PublisherContract
{
   public function getAll()
   {
       $publisher = Publisher::all();
       return $publisher;
   }

    public function create($request)
    {
//        $result = $request->all();
        Author::create([
            'name' =>$request->input(''),
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
        $author = Author::findOrFail($ids);


//        if (count($author->books)) {
//            return $result['error'];
//
//        } else {
//            Category::destroy($ids);
//            return $result['success'];
//        }
        Author::destroy($ids);
        return $result['success'];

    }
}
