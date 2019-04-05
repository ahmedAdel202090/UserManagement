<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class UserController extends Controller
{
    public function addUser(Request $request)
    {
            $validator=Validator::make($request->all(),[
                'email'=>'required|email',
                'fullName'=>'required|regex:/^[\pL\s\-]+$/u|max:255'
            ]);
            if($validator->fails())
            {
                return json_encode(['status'=>406,'invalid'=>'some data are invalid','errorMsg'=>$validator->messages()]);
            }
        //create new User 
        //add dataBase Logic
        //successfully added
        $response=['status'=>200,'msg'=>'successfully signed up','name'=>$request->input('fullName')];
        return json_encode($response);
    }
}
