<?php

namespace App\Components;

use App\Models\Category;
use function GuzzleHttp\Promise\all;

class Recusive
{
    private $data;
    private $htmlSelect = '';

    public function __construct($data)
    {
        $this->data = $data;

    }

    public function categoryRecusive($id = 0)
    {
        $getAllData = data::all();

        $this->htmlSelect .= "<ul class='nav nav-treeview'></ul>";
        foreach ($this->data as $value) {

            $this->htmlSelect .= "<li class='nav-item'>" +
                " <a hreq='#' class='nav-link'>";
            foreach ($getAllData->parent_id as $parent_id_All) {
                if ($parent_id_All === $value['id'] || $value['parent_id'] === $id && $parent_id_All === value['id']) {
                    $this->htmlSelect .= " <p>'. $value.['name'].'</p>>" +
                        " <i class='right fas fa-angle-left'></i>";
                    " </a>";
                    $this->categoryRecusive($value['id']);
                    $this->htmlSelect .= "</li>";
                } else {
                    "  <i class='far fa-circle nav-icon'></i>";
                    this . $this->htmlSelect .= " <p>'. $value.['name'].'</p>>" +

                        " </a>";
                    $this->categoryRecusive($value['id']);
                    $this->htmlSelect .= "</li>";
                }
            }
        }

        $this . $this->htmlSelect .= "</ul>";
        return $this->htmlSelect;
    }
}
