<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Company;
use App\InterestTag;
use App\CompanyHasInterests;

class CompanyService
{
    public function addCompany(Request $request)
    {
        $company=new Company();
        $company->name=$request->input('name');
        $company->save();
        $interests=json_decode($request->input('interests'));
        foreach($interests as $interest)
        {
            if(!InterestTag::where('name','=',$interest)->exists())
            {
                $tag=new InterestTag();
                $tag->name=$interest;
                $tag->save();
            }
            $companyTags=new CompanyHasInterests();
            $companyTags->companyId=$company->id;
            $companyTags->tagName=$interest;
            $companyTags->save();
        }
    }
}
