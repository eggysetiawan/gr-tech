<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companies = ['facebook', 'amazon', 'apple', 'netflix', 'google'];

        foreach ($companies as $company) {
            Company::create([
                'name' => ucfirst($company),
                'slug' => Str::slug($company),
                'email' => 'mail@' . $company . '.com',
                'website' => 'www.' . $company . '.com',
            ]);
        }
    }
}
