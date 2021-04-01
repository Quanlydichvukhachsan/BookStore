<?php


namespace App\viewModels;
use App\viewModels\TextModels;

class TreeModels
{
// Properties
    public $text;
    public $children =array();

    // Methods
    function setText($text) {
        $this->text = $text;
    }
    function getText() {
        return   $this->text;
    }

    // Methods
    function setChildren(TextModels $text) {
        array_push($this->children,$text);
    }
    function getChildren():array {

        return   $this->children;
    }

}
