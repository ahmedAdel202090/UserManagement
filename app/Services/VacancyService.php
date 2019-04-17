<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Vacancy;
use App\Company;
class VacancyService
{
    public function addVacancy(Request $request,$companyId)
    {
        if(!Company::where('id','=',$companyId)->exists())
            return ['status'=>'faild','msg'=>'this company not exists'];
        $vacancy=new Vacancy();
        $vacancy->vacancyName=$request->input('name');
        $vacancy->companyId=$companyId;
        $vacancy->save();
        return ['status'=>'success']; 
    }
}