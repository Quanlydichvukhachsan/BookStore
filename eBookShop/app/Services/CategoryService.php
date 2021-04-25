<?php namespace App\Services;
use App\Models\Category;
use App\Contracts\CategoryContract;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Array_;
use Spatie\Permission\Models\Role;
use App\viewModels\showCategoryModel;
use function GuzzleHttp\Promise\all;

class CategoryService implements CategoryContract{
    public function index()
    {
        $paren_id =0;
        $data = $this->get_node_parentid($paren_id);

        return json_encode(array_values($data));
    }
    public function get_node_parentid($parent_id)
    {
        $result = Category::where('parent_id','=',$parent_id)->get();
        $outPut = array();
        foreach ($result as $row)
        {
            $sub_node = array();
            $sub_node["text"] = $row["name"];
            $sub_node["node"] = array_values($this->get_node_parentid($row["id"]));
            $outPut[] = $sub_node;
        }
        return $outPut;
    }


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
        $space ='';
        $htmlOption='<option value="0">'."--Lưa chọn nhóm cha--".'</option>';

        $category = Category::where('parent_id','=',0)->get();
        foreach ($category as $item)
        {
            $htmlOption.='<option onclick="formatText()" value="'.$item["id"].'">'.$space.$item["name"].'</option>';

            if (count($item->childs))
            {
                $htmlOption.= $this->childsOption($item,$space);
            }
        }
        return $htmlOption;
    }
    public function childsOption($category,$space)
    {
        $space='&nbsp;&nbsp;&nbsp;&nbsp;';

        $htmlOption='';
        $childs = $category->childs;

        foreach ($childs as $item)
        {
            $htmlOption.='<option  value="'.$item->id.'">'.$space.$item->name.'</option>';
            if (count($item->childs))
            {
                $space.=$space;
                $htmlOption.=$this->childsOption($item,$space);
            }
        }
        return $htmlOption;
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

    public function store($request)
    {
        //['name' => $category['name'], 'parent_id' =>$category['parent_id']]
        $category = $request->all();
        Category::create($category);
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
