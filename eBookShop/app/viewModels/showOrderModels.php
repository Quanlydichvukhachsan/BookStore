<?php


namespace App\viewModels;


class showOrderModels
{
    private $id;
    private $name;
    private $fullName;
    private $email;
    private $city;
    private $phoneNumber;
    private $address;
    private $country;
    private $totalPrice;
    private $status;
    private $listBookViewModel =array();
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress() {
        return $this->address;
    }


    public function setCountry($country) {
        $this->country = $country;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function setListBookViewModel(bookViewModels $bookViewModel) {
        array_push($this->listBookViewModel,$bookViewModel);
    }


    public function getListBookViewModel() {
        return $this->listBookViewModel;
    }

}
