<?php namespace App\Services;
use App\Models\Category;
use App\Contracts\CategoryContract;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Array_;
use Spatie\Permission\Models\Role;
use App\viewModels\showCategoryModel;
use function GuzzleHttp\Promise\all;

class CategoryService implements CategoryContract{




    public function getAll()
    {
        $html ='';
        $category = Category::where('parent_id','=','0')->get();
        foreach ($category as $cate)
        {
            if ($cate->childs())
            {
                $html.='<li data-expanded="false">'
                    .'<span><span class="col-9">'.$cate['name'].'</span><button class="hide" id="btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
    </svg>
</button>
</span>';
                $this->childview($cate['id'],$html);
                $html.='</li>';
                dd($html);
            }
            else
            {
                $html.='<li>'.$cate["name"]
                    .'<span><span class="col-9">1231</span><button class="hide" id="btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
    </svg>
</button>
</span></li>';
            }
        }
        return $html;

    }

    public function childview($parent_id,$html)
    {
        $categoryChild= Category::where('parent_id','=',$parent_id)->get();
        foreach ($categoryChild as $cateChild)
        {
                $html.='<ul>';
                    if ($cateChild->childs())
                    {
                        $html.='<li  data-expanded="false">'
                            .'<span><span class="col-9">'.$cateChild['name'].'</span><button class="hide" id="btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
    </svg>
</button>
</span>';
                        $this->childview($cateChild['id'],$html);
                        $html.='</li>';
                    }
                    else
                    {
                        $html='<li>'
                            .'<span><span class="col-9">'.$cateChild["name"].'</span><button class="hide" id="btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
    </svg>
</button>
</span></li>';
                    }
         $html.='</ul>';

        }

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
