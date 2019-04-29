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
        else
        {
        $user=new User();
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->fullName=$request->input('fullName');
        $user->phone=$request->input('phone');
        $user->save();
        return ['status'=>'success'];
    }
    }

    public function userLogIn(Request $request){
        if(User::where('email','=',$request->input('email'))->where('password','=',$request->input('password'))->exists() )
        {
            return ['status'=>'success'];
        }
        else
        {
            return ['status'=>'faild','msg'=>'invalid email OR password'];
        }
    }

}
