<?php


namespace App\viewModels;


class childModels
{
    public $text;
    public $checked;

    function setText($text)
    {
        $this->text = $text;
    }

    function getText()
    {
        return $this->text;
    }

    function setChecked($checked)
    {
        $this->checked = $checked;
    }

    function getChecked()
    {
        return $this->checked;
    }
}
