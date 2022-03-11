<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $company = new Company();
        $company->id = 1;
        $company->c_name = "L'Oréal";
        $company->c_email = "contact@oreal.com";
        $company->c_telephone = "0 969 390 701";
        $company->c_no_street = "41";
        $company->c_streetname = "rue Martre";
        $company->c_city = "Clichy";
        $company->c_postalcode = "92117";
        $company->c_detail = "Parce que je le vaux bien";
        $company->save();
    }
}
