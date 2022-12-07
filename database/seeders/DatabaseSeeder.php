<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            "Certificate of Low Income",
            "Barangay Residency"
        ];

        foreach ($forms as $form){
            DB::table('forms')->insert([
                "form_name" => $form
            ]);
        }

        // Insert positions

        $positions = [
            "Barangay Chairman",
            "Barangay Kagawad",
            "SK Chairman",
            "SK Kagawad",
            "Barangay Secretary",
            "Barangay Treasurer"
        ];

        foreach ($positions as $position){
            DB::table('employee_types')->insert([
                "position" => $position
            ]);
        }

        // Insert superadmin

        // Add superadmin

        DB::table("users")->insert([
            "name" => "Super Admin",
            "admin_type" => "superadmin",
            "email" => "plabio_superadmin@gmail.com",
            "password" => Hash::make("plabio_superadmin123"),
            "admin_type" => "superadmin",
            "approved" => true
        ]);

        // Seeders

        //Resident::factory(15)->create();
        
    }
}
