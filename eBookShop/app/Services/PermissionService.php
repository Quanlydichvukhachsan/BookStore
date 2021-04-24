<?php


namespace App\Services;


use App\Contracts\PermissionContract;
use Spatie\Permission\Models\Permission;

class PermissionService implements PermissionContract
{

    public function getAll()
    {
       $permissions = Permission::all();
       return $permissions;
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }
}
