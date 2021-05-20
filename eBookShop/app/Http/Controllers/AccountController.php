<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    //
    /**
     * Display the specified resource.
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function index($id){
         $user =  User::findOrFail($id);
         return view('app.account',compact('user'));
   }

    //
    /**
     * Display the specified resource.
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request,$id){
        $input =$request->all();
        $user =  User::findOrFail($id);
        global $result;
       if(!count($user->getRoleNames()) && Hash::check($input['passwordOld'], $user->password)){
            $user->phoneNumber = $input['phoneNumber'];
            $user->email = $input['email'];
            $user->password =Hash::make($input['password']);
            $user->firstName = $input['firstName'];
            $user->lastName = $input['lastName'];
            $user->save();
            $result = "Cập nhật thành công!";
        }else{
            $result = "Sai password!";
        }


        return response()->json(["result"=>$result]);
    }
}
