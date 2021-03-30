<?php namespace App\viewModels;

class CategotiesBookRequest{
    private $id;
    private $name;
    private $parent_id;

    public function setCategoriesId($id) {
        $this->id = $id;
      }

      public function getCategoriesId() {
        return $this->id;
      }

      public function setNameCategories($name) {
        $this->name = $name ;
      }

      public function getNameCategories() {
        return $this->name;
      }

    public function setParentIdCategory($parent_id) {
        $this->parent_id = $parent_id ;
    }

    public function getParentIdCategory() {
        return $this->parent_id;
    }
}
