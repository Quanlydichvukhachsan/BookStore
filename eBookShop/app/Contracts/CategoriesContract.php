<?php namespace App\Contracts;
use App\viewModels\CategotiesBookRequest;

namespace App\Contracts;
interface OrderContract{
    public function paginate();
    public function find($id);
    public function getAll();
    public function store(CategotiesBookRequest $categotiesBookRequest);
    public function update(CategotiesBookRequest $categotiesBookRequest, $id);
    public function destroy($id);
}
