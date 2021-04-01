<?php


namespace App\viewModels;


class TextModels
{
    public $text;

    function setText($text)
    {
        $this->text = $text;
    }

    function getText()
    {
        return $this->text;
    }
}
