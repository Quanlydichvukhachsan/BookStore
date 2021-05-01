<?php
namespace App\Contracts;

interface AuthorContract{
    public function create($request);
    public function update($Request, $id);
    public function delete($id);
}
