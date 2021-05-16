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

    function convert_name($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        return $str;
    }
     function formatNameToSlug($str){

         $strClean = explode(" ", $str);
         $arrSplit = array_diff($strClean, array("-"));

         $arrFormat = array();
         foreach ($arrSplit as $str){
             $strNew = $this->convert_name($str);
             array_push($arrFormat,$strNew);
         }
         $titleSlug =  join("-",$arrFormat);
         return $titleSlug;
     }
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
          $showCategoryModel->setTitleSlug($this->formatNameToSlug($item->name));
            if($item->childs->count() >0){
                foreach ($item->childs as $child) {
                    $childModel =new showCategoryModel();
                    $childModel->setId($child->id);
                    $childModel->setName($child->name);
                    $childModel->setTitleSlug($this->formatNameToSlug($child->name));
                    $showCategoryModel->setChilds($childModel);
                }
            }
            $productViewModels->setListCategory($showCategoryModel);
        }
       return $productViewModels ;
    }

}
