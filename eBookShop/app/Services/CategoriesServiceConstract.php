<?php
namespace App\Services;
use App\viewModels\CategotiesBookRequest;
interface CategoriesServiceConstract
{
    public function paginate();
    public function find($id);
    public function getAll();
    public function store(CategotiesBookRequest $categotiesBookRequest);
    public function update(CategotiesBookRequest $categotiesBookRequest, $id);
    public function destroy($id);
}
?>
