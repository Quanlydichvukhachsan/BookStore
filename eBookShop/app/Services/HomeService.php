<?php


namespace App\Services;


use App\Contracts\HomeContract;
use App\Models\Book;
use App\Models\Category;
use App\viewModels\bookViewModels;
use App\viewModels\productViewModels;
use App\viewModels\showCategoryModel;
use Illuminate\Support\Facades\DB;

class HomeService implements HomeContract
{

    public function getAll()
    {
         $books =  Book::all()->take(10);
         $categorys =  Category::where('parent_id', '=', 0)->get();
        $productViewModels =new productViewModels();
         foreach ($books as $book){

               $bookViewModels =new bookViewModels();
               $bookViewModels->setId($book->id);
               $bookViewModels->setPrice($book->price);
               $bookViewModels->setImages($book->imagebooks[0]->file);
               $bookViewModels->setTitle($book->title);
             $productViewModels->setListBook($bookViewModels);

         }
        foreach ($categorys as $item){
            $showCategoryModel =new showCategoryModel();
            $showCategoryModel->setId($item->id);
            $showCategoryModel->setName($item->name);
            if($item->childs->count() >0){
                foreach ($item->childs as $child) {
                    $childModel =new showCategoryModel();
                    $childModel->setId($child->id);
                    $childModel->setName($child->name);
                    $showCategoryModel->setChilds($childModel);
                }
            }
            $productViewModels->setListCategory($showCategoryModel);
        }
       return $productViewModels ;
    }
}
