<?php namespace App\Services;
use App\Models\Category;
use App\Contracts\CategoryContract;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Parent_;
use Spatie\Permission\Models\Role;
use App\viewModels\showCategoryModel;
use function GuzzleHttp\Promise\all;

class CategoryService implements CategoryContract{




    public function getAll($Category,$parent_id)
    {
         $html ='';
         $name_default="--Lưa chọn nhóm cha--";
        $Category = Category::where('parent_id','=',$parent_id)->get();
        foreach ($Category as $cate)
        {
            if (count($cate->childs))
            {
                $html.='<li data-expanded="false"><button onclick="myText(this)" id="'.$cate->id.'" name="'.$name_default.'" value="'.$cate->id.'" data-toggle="modal" data-target="#exampleModal1">'.$cate->name.'</button>';
                $html.=$this->childview($cate);
                $html.='</li>';
            }
            else
            {
                $html.='<li><button onclick="myText(this)" id="'.$cate->id.'" name="'.$name_default.'" value="'.$cate->id.'" data-toggle="modal" data-target="#exampleModal1">'.$cate->name.'</button></li>';
            }
        }
        return  $html;
    }

    public function childview($Category)
    {
        $childs =$Category->childs;

        //$Cate = Category::Where('id','=',$Category->childs[0]->parent_id)->first();
        $htmlS='<ul>';
        foreach ($childs as $cateChild)
        {
                    if (count($cateChild->childs))
                    {
                        $htmlS.='<li id="edit" value="'.$cateChild->id.'" data-expanded="false" class="active"><button onclick="myText(this)" id="'.$cateChild->id.'" name="'.$Category->name.'" value="'.$cateChild->id.'" data-toggle="modal" data-target="#exampleModal1" >'.$cateChild->name.'</button>';
                        $htmlS.=$this->childview($cateChild);

                        $htmlS.='</li>';
                    }
                    else
                    {
                         $htmlS.='<li><button onclick="myText(this)" id="'.$cateChild->id.'" name="'.$Category->name.'" value="'.$cateChild->id.'" data-toggle="modal" data-target="#exampleModal1" >'.$cateChild->name.'</button></li>';
                    }
        }
        $htmlS.='</ul>';
        return   $htmlS;
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
