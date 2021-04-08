<?php namespace App\Services;
use App\Models\Category;
use App\Contracts\CategoryContract;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CategoryService implements CategoryContract{


    public function getAll($Categories,$parent_id)
    {
        $Categories = Category::where('parent_id', '=', $parent_id)->get();
//        dd($Categorys[1]->childs);
        $tree='<ul class="collapse"  id="category"  data-parent="#sidebar-menu">
               <div class="sub-menu">';
        foreach ($Categories as $Category) {
           $name=  str_replace(' ', '', $Category->name);
            $tree .='<li class="has-sub"> <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#'.$name.'"
 aria-expanded="true" aria-controls="'.$name.'">
<span class="nav-text">'.$Category->name.'</span>';
            if(count($Category->childs)) {
               // $tree .="<b class='caret'></b>";
                $tree.="<b class='caret'></b></a>";
                $tree .=$this->childView($Category);
                $tree .="</li>";
            }
            else
            {
                $tree.="</a></li>";
            }
        }
        $tree .='</div></ul>';
        return $tree;
    }

    public function childview($Category){
        $childs =$Category->childs;
        $cate = Category::Where('id','=',$Category->childs[0]->parent_id)->first();

        $name=  str_replace(' ', '', $cate->name);
//        dd($name);

        $html ='<ul  class="collapse" id="'.$name.'">.
                <div class="sub-menu">';

        foreach ($childs as $arr) {
            if(count($arr->childs)){
          $html .='<li>
                         <a class="sidenav-item-link" href="user-profile.html">
                            '.$arr->name.'
                         </a>';
//               $html.= $this->childView($arr);
                $html.= $this->getAll($arr,$arr->childs[0]->parent_id);
            }else{
                $html .='<li><a class="sidenav-item-link" href="#">'.$arr->name.'</a>';
                $html .="</li>";
            }
        }
        $html .="</div></ul>";
        return $html;
    }

    public function show($id)
    {


    }
    public function create()
    {
        $html="";
        $category = Category::where('parent_id','=',0)->get();
        foreach ($category as $item)
        {
            $html.='<option value="' .$item->id. '">'.$item->name.'</option>';
            if (count($item->childs))
            {
                $html.=$this->childOption($item);
            }
        }
        return $html;
    }
    public function childOption($category)
    {
        $html="";
        $categories = $category->childs;
        foreach ($categories as $child)
        {
            $html='<option value="'.$child->id.'">'.$child->name.'</option>';
            dd($child);
            if (count($child->childs))
            {
                dd($child->childs);
//                $this->childOption($child);
            }
        }
        return $html;
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
