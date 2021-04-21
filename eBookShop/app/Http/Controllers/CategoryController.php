<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Contracts\CategoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class CategoryController extends Controller
{
    protected $CategoryContract;

    public function __Construct(CategoryContract $CategoryContract)
    {
        $this->CategoryContract = $CategoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $html = $this->CategoryContract->getAll(Category::all(), 0);
        $f =Category::All();

        return view('admin.category.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this->CategoryContract->create();
        return $htmlOption;



    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->CategoryContract->store($request);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $input = $request->all();
        $categories = Category::findOrFail($id);
        $cate = Category::where('name', '=', $input['name'])->first();
        if ($cate !== null && $input['name'] === $categories->name || $cate === null) {
            $categories->name = $input['name'];
            $categories->save();
        } else {
            return redirect()->back()->withErrors('category existed');
        }
        session()->flash('update-category', 'Update Success!');
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $check = Genres::where('categories_id', '=', $categories['id'])->exists();
        //$check = $categories->genres->exists();
        if (!$check) {
            Category::destroy($id);
            session()->flash('delete-category', 'Delete Success!');
        } else {
            session()->flash('delete-error', 'Category exiting in Genres!');
        }

        return redirect()->route('category.index');
    }
}
