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
        $arrayData =array();
        $arrayRoleHasPermission = array();
         $role =  Role::findOrFail($id);
         $permissions = Permission::all();
        $roleHasPermission =$role->permissions;
        foreach ($roleHasPermission as $idPermission){
            array_push($arrayRoleHasPermission,$idPermission->id);
        }
        array_push($arrayData, $role);
        array_push($arrayData, $permissions);
        array_push($arrayData, $arrayRoleHasPermission);

         return $arrayData;
    }
}
