<?php


namespace App\viewModels;


class bookViewModels
{
    private $title;
    private $amount;
    private $price;
    private $images;
    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setImages($images) {
        $this->images = $images;
    }

    public function getImages() {
        return $this->images;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getAmount() {
        return $this->amount;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }


}
