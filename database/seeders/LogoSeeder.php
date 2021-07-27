<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            $company
                ->addMedia(storage_path('companylogo/' . $company->slug . '.png'))
                ->preservingOriginal()
                ->usingFileName($company->slug . '-logo')
                ->toMediaCollection('company-logo');
        }
    }
}
