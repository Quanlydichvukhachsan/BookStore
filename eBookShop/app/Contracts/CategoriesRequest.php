<?php
namespace App\Contracts;

use App\Models\Category;
use App\Components\Recusive;

class CategoriesRequest implements CategoriesContract
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function paginate()
    {
        return $this->category->paginate(10);
    }
    public function find($id)
    {
        return $this->category->findOrFail($id);
    }
    public function getAll()
    {
        $this->category::all();
    }
    public function store(CategotiesBookRequest $categotiesBookRequest)
    {
        return $this->category->create($categotiesBookRequest);
    }
    public function update(CategotiesBookRequest $categotiesBookRequest, $id)
    {
        $category = $this->find($id)->first();
        return $category->update($categotiesBookRequest);
    }
    public function destroy($id)
    {
        $category = $this->find($id)->first();
        return $category->destroy($id);
    }
}
