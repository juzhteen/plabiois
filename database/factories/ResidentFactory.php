<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Resident;

class ResidentFactory extends Factory
{
    protected $model = Resident::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name(),
            "age"=>$this->faker->numberBetween($min=15, $max=54),
            "gender"=>$this->faker->randomElement($array = array ('Male','Female','I prefer not to say')),
            "civil_status"=>$this->faker->randomElement($array = array ('Single','Married','Divorced', 'Separated')),
            "religion"=>$this->faker->randomElement($array = array ('Islam','Roman Catholic','Aglipayan', 'Iglesia ni Cristo')),
            "weight"=>$this->faker->numberBetween($min=28, $max=85),
            "height"=>$this->faker->numberBetween($min=90, $max=150),
            "purok"=>$this->faker->numberBetween($min=1, $max=6),
            "email_address"=>$this->faker->email(),
            "phone_number"=> function(){
                $number = $this->faker->numberBetween($min=111111111, $max=999999999);
                return "09".$number;
            }
        ];
    }
}
