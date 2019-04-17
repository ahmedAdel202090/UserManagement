<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\UserService;
class UserController extends Controller
{
    public function addUser(Request $request)
    {
            $validator=Validator::make($request->all(),[
                'fullName'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
                'email'=>'required|email|max:255',
                'password'=>'required|max:255',
                'phone'=>'required|max:15|regex:/^[0-9]*$/'
            ]);
            if($validator->fails())
            {
                return json_encode(['status'=>406,'invalid'=>'some data are invalid','errorMsg'=>$validator->messages()]);
            } 
        //add dataBase Logic
        $service=new UserService();
        $insertionStatus=$service->addUser($request);
        if($insertionStatus['status']=='success')
        {
            //successfully added
            $response=['status'=>200,'msg'=>'successfully signed up','name'=>$request->input('fullName')];
            return json_encode($response);
        }
        return json_encode($insertionStatus);
    }
}