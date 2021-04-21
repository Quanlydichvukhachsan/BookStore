<?php


namespace App\Services;

use App\Contracts\AccessContract;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AccessService implements  AccessContract
{

    public function getAll()
    {
        $role = Role::all();
        return $role;
    }

    public function show($id)
    {

    }

    public function create($request)
    {
        $name =$request->input('name');
        $role= Role::create(['name'=>$name]);
         $permission= Permission::all();
         $role->givePermissionTo($permission);
         return $role;
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
