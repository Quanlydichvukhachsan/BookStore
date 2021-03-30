<?php
namespace App\Services;

use App\Contracts\CategoriesConstract;
use App\viewModels\CategotiesBookRequest;

class CategoriesService implements CategoriesServiceConstract
{
    protected $category;
    public function __construct(CategoriesConstract $categoriesConstract)
    {
        return $this->category = $categoriesConstract;
    }
    public function paginate()
    {
        // TODO: Implement paginate() method.
        return $this->category->paginate();
    }
    public function find($id)
    {
        // TODO: Implement find() method.
        return $this->category->find($id);
    }
    public function getAll()
    {

    }
    public function store(CategotiesBookRequest $categotiesBookRequest)
    {
        // TODO: Implement store() method.
        return $this->category->store($categotiesBookRequest);
    }

    public function update(CategotiesBookRequest $categotiesBookRequest, $id)
    {
        // TODO: Implement update() method.
        return $this->category->update();
    }
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        return $this->category->destroy($id);
    }
}
