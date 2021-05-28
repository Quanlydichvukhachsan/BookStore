<?php


namespace App\viewModels;


class bookViewModels
{
    private $author;
    private $title;
    private $amount;
    private $price;
    private $images;
    private $id;
    private $titleSlug;


    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function getAuthor()
    {
        return $this->author;
    }

    public function setTitleSlug($titleSlug)
    {
        $this->titleSlug = $titleSlug;
    }
    public function getTitleSlug()
    {
        return $this->titleSlug;
    }

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
