<?php

namespace App\Http\Controllers;

use App\Contracts\AccessContract;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Contracts\Session\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $accessContract;

   public function __construct(AccessContract $accessContract){
         $this->accessContract =$accessContract;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $role = $this->accessContract->getAll();
        return view('admin.role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
         $role = $this->accessContract->create($request);
        return response()->json(['success' => 'Success add new role!', 'role' => $role]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->accessContract->edit($id);

      return response()->json(["role"=>$data[0],"permissions"=>$data[1],"arrayRoleHasPermission"=>$data[2]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $input = $request->all();
        $arrayNamePermission = array();
        $originPermission = Permission::all();

        foreach ($originPermission as $namePermission){
            array_push($arrayNamePermission,$namePermission->name);
        }


        if(array_key_exists('arrayIdPermiss',$input))
        {
            foreach ($originPermission as $permission){
                if(in_array($permission,$input['arrayIdPermiss']) === false){

                    $role->revokePermissionTo($permission);
                }
            }
            $role->givePermissionTo($input['arrayIdPermiss']);
        }else{
            $role->syncPermissions([]);
        }


        $request->session()->flash('update-role','The Role update success!');

     return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //   $role = Role::findOrDetail($id);
          Role::destroy($id);
        \Illuminate\Support\Facades\Session::flash('delete-role','Role delete success!');
        return redirect()->back();
    }
}
