<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\CompanyService;
class CompanyController extends Controller
{
    public function addCompany(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'interests'=>'required'
        ]);
        $interests=json_decode($request->input('interests'));
        if($validator->fails())
        {
            return json_encode(['status'=>406,'errorMsg'=>$validator->messages()]);
        }
        if(count($interests)>5)
        {
            return json_encode(['status'=>406,'errorMsg'=>'company interestes should not exceed 5']);
        }
        //delegate to service 
        $service=new CompanyService();
        $service->addCompany($request);
        return json_encode(['status'=>200,'msg'=>'successfully Company added','name'=>$request->input('name')]);
    }
}
