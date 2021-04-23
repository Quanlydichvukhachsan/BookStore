<?php
namespace App\Contracts;

interface CategoryContract{
    public function getAll($categories, $parent_id);
    public function childview($data);
    public function show($id);
    public function create();
    public function update($request,$id);
    public function delete($id);
    public function store($request);
    public function editCategory($id);
    public function edit($id);

}
