<?php


namespace App\Services;

use App\Contracts\PublisherContract;
use App\Models\Publisher;
use Symfony\Component\Console\Input\Input;

class PublisherService implements PublisherContract
{
   public function getAll()
   {
       $publisher = Publisher::all();
       return $publisher;
   }

    public function create($request)
    {

        $result = array('error' => 'error', 'success' => 'success');
        $check = Publisher::where('name','=',$request['add-name-publisher'])->first();
        if ($check === null){
            Publisher::create([
                'name' =>$request->input('add-name-publisher'),
            ]);
            return $result['success'];
        }
        else{
            return  $request['error'];
        }




    }
    public function update($Request)
    {
        $result = array('error' => 'error', 'success' => 'success');
        $check = Publisher::where('name','=',$Request['edit_name_publisher'])->first();
        $publisher = Publisher::where('íd','=',$Request['idPublisher']);
        if ($check === null)
        {
            $publisher->name = $Request['edit_name_publisher'];
            $publisher->save($publisher);
            return $result['success'];
        }
        else{
            return $result['error'];
        }


    }
    public function delete($Request)
    {
        $ids = $Request['idPublisher'];
        $result = array('error' => 'error', 'success' => 'success');
        $publisher = Publisher::findOrFail($ids);


//        if (count($author->books)) {
//            return $result['error'];
//
//        } else {
//            Category::destroy($ids);
//            return $result['success'];
//        }
        Publisher::destroy($ids);
        return $result['success'];

    }
}
