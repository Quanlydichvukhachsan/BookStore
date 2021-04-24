<?php


namespace App\Services;


use App\Contracts\PermissionContract;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $input =$request->all();
        $permissions = $request->input(['arrayPermission']);
        $result = array('error' => 'error',
            'success' =>'success');

        if(array_key_exists('cancelUser',$input)){
            $users = User::all();
            foreach ($users as $user){
                $user->revokePermissionTo($permissions);
            }
        }elseif (array_key_exists('cancelRole',$input)){
            $roles = Role::all();
            foreach ($roles as $role){
                $role->revokePermissionTo($permissions);
            }
        }

        return  $result['success'];
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
