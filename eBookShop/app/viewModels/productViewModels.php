<?php


namespace App\viewModels;




class productViewModels
{
    private $listBook =array();
    private $listCategory =array();

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
