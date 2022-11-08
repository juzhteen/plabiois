<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use App\Models\Resident;
use App\Models\EmployeeType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Insert form types

        $forms = [
            "Barangay Certification",
            "Barangay Clearance",
            "Case Invitation",
            "Certificate of Indigency",
            "Certificate of Low Income"
        ];

        foreach ($forms as $form){
            DB::table('forms')->insert([
                "form_name" => $form
            ]);
        }

        $positions = [
            "Barangay Chairman",
            "Barangay Kagawad",
            "SK Chairman",
            "Barangay Secretary",
            "Barangay Treasurer"
        ];

        foreach ($positions as $position){
            DB::table('employee_types')->insert([
                "position" => $position
            ]);
        }

        // Seeders

        Resident::factory(15)->create();
        
    }
}
