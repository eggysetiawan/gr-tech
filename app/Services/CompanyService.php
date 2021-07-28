<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Str;

class CompanyService
{
    public $companies;

    public function createCompany($request)
    {
        $attr = $request->validated();
        $attr['slug'] =  Str::slug($request->name);
        $this->companies = Company::create($attr);
        $this->uploadImg($request);
    }

    public function uploadImg($request)
    {
        if ($request->has('img')) {
            $this->companies->addMediaFromRequest('img')
                ->toMediaCollection('company-logo');
        }
    }

    public function updateImg(Company $company, $request)
    {
        if ($request->has('img')) {
            if (!$company->getFirstMediaUrl('company-logo')) {
                $company->addMediaFromRequest('img')
                    ->toMediaCollection('company-logo');
            } else {
                $company->media()->delete();
                $company->addMediaFromRequest('img')
                    ->toMediaCollection('company-logo');
            }
        }
    }
}
