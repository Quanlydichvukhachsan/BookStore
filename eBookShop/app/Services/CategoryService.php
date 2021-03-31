<?php namespace App\Services;
use App\Models\Category;
use App\Contracts\CategoryContract;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CategoryService implements CategoryContract{

    public function treeView(){


    }


    public function getAll()
    {
        $Categorys = Category::where('parent_id', '=', 0)->get();
        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
        foreach ($Categorys as $Category) {
            $tree .='<li class="tree-view closed"<a class="tree-name">'.$Category->name.'</a>';
            if(count($Category->childs)) {
                $tree .=$this->childView($Category);
            }
        }
        $tree .='<ul>';
        return $tree;
    }
    public function childview($Category){
        $html ='<ul>';
        foreach ($Category->childs as $arr) {
            if(count($arr->childs)){
                $html .='<li class="tree-view closed"><a class="tree-name">'.$arr->name.'</a>';
                $html.= $this->childView($arr);
            }else{
                $html .='<li class="tree-view"><a class="tree-name">'.$arr->name.'</a>';
                $html .="</li>";
            }

        }

        $html .="</ul>";
        return $html;
    }

    public function show($id)
    {


    }

    public function create($request)
    {
        $user = User::create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'userName' => $request['userName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole($request['arrayRole']);

           return $user;
    }

    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $input =  $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        $input['password'] = bcrypt($request->password);
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->userName =$request->input('userName');
        $email = User::all()->where('email',$input['email'])->first();
        if($email === $user->email &&$email !==null ||$email ===null ){
            $user->email = $request->input('email');
        }
        $user->password =$input['password'];
        if(array_key_exists('photo_id',$input)){
            $user->photo_id =$input['photo_id'];
        }

        $user->save();

        $request->session()->flash('update-user','User update success!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if($user->photo){
            unlink( public_path() . $user->photo->file);
            $user->photo->delete();
        }
        $user::destroy($id);

        session()->flash('delete-user','Delete  user success!');
    }

    public function addCategory($request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        $arrayNameRole = array();
        $originRole = Role::all();

        foreach ($originRole as $nameRole){
            array_push($arrayNameRole,$nameRole->name);
        }


        if(array_key_exists('arrayIdRole',$input))
        {
            foreach ($originRole as $role){
                if(in_array($role,$input['arrayIdRole']) == false){

                    $user->removeRole($role);
                }
            }
            $user->assignRole($input['arrayIdRole']);
        }else{
            $user->syncRoles([]);
        }
        $request->session()->flash('assignRole-user','Assign role user success!');
    }

    public function editCategory($id)
    {
        $user = User::findOrFail($id);
        $role = Role::all();
        $arrayIdRole = array();
        $IdRole =$user->roles;
        foreach ($IdRole as $idRoles){
            array_push($arrayIdRole,$idRoles->id);
        }
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return $users;
    }
}
