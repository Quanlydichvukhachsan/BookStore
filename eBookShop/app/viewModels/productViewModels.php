<?php


namespace App\viewModels;




class productViewModels
{
    private $listBook =array();
    private $listCategory =array();
    private $pathName;
    private $pathId;

    public function setpathName($name) {
       $this->pathName =$name;
    }


    public function getpathName()  {
        return $this->pathName;
    }

    public function setpathId($id) {
        $this->pathId =$id;
    }


    public function getpathId()  {
        return $this->pathId;
    }
    public function setListBook($books) {
        array_push($this->listBook,$books);
    }


    public function getListBook() :array {
        return $this->listBook;
    }

    public function setListCategory( showCategoryModel $category) {
        array_push($this->listCategory,$category);
    }


    public function getListCategory() :array {
        return $this->listCategory;
    }
}
