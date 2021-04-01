<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    protected $userContract;
    use HasRoles;

    public function __construct(UserContract $userContract)
    {
        $this->middleware('auth');
        $this->userContract = $userContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->userContract->getAll();
        return view('admin.user.index', ['user' => $result['user'], 'arrRole' => $result['arrayRole']]);

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->userContract->create($request);


        return response()->json(['success' => 'Added new records.', 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('admin.user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return redirect()->route('user.index');
    }

    public function editRole($id)
    {
        $responseText = $this->userContract->editRole($id);
       // dd($data);
         //, compact('role', 'arrayIdRole', 'user')
        return $responseText;
        // return response()->json(['responseText'=>$responseText]);
    }

    /**
     * add role user
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function addRole(Request $request, $id)
    {


        return redirect()->route('user.index');
    }
}
