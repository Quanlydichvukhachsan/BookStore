<?php


namespace App\viewModels;
use App\viewModels\childModels;

class TreeModels
{
// Properties
    public $text;
    public $children =array();
    public  $checked ;
    // Methods
    function setText($text) {
        $this->text = $text;
    }
    function getText() {
        return   $this->text;
    }
    function setChecked($checked) {
        $this->checked = $checked;
    }
    function getChecked() {
        return   $this->checked;
    }


    // Methods
    function setChildren(childModels $text) {
        array_push($this->children,$text);
    }
    function getChildren():array {

        return   $this->children;
    }

}
