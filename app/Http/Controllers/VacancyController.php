<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\VacancyService;

class VacancyController extends Controller
{
    function addVacancy(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|regex:/^[\pL\s\-]+$/u'
        ]);
        if($validator->fails())
        {
            return json_encode(['status'=>406,'errorMsg'=>$validator->messages()]);
        }
        if(!$request->has('id'))
            return json_encode(['status'=>406,'errorMsg'=>'you should add company id in parameter']);
        $companyId=$request->query('id');
        //delegate the insertion to vacancy service

        $service=new VacancyService();
        $insertionStatus=$service->addVacancy($request,$companyId);
        if($insertionStatus['status']=='success')
        {
            //successfully added
            $response=['status'=>200,'msg'=>'successfully Vacancy Added','name'=>$request->input('name')];
            return json_encode($response);
        }
        return json_encode($insertionStatus);
    }
}
