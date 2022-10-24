<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Form;

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
        
    }
}
