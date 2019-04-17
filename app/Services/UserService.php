<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\User;

class UserService
{
    public function addUser(Request $request)
    {
        if(User::where('email','=',$request->input('email'))->exists())
            return ['status'=>'faild','msg'=>'this email already exist'];
        $user=new User();
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->fullName=$request->input('fullName');
        $user->phone=$request->input('phone');
        $user->save();
        return ['status'=>'success'];
    }

    public function checkUser(Request $request){
        if((User::where('email','=',$request->input('email'))->exists()) && (User::where('password','=',$request->input('password'))->exists()) )
        {
            return ['status'=>'success'];
        }


    }

}
