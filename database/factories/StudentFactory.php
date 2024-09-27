<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'photo' => $this->faker->word(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'mother_name' => $this->faker->name(),
            'guardian_father_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'uni_roll_number' => $this->faker->word(),
            'uni_registration_no' => $this->faker->word(),
            'date_of_birth' => $this->faker->date(),
            'gender'=> $this->faker->randomElement(['male','female','others']),
            'alt_phone' => $this->faker->phoneNumber(),
            'father_phone' => $this->faker->phoneNumber(),
            'club_name' => $this->faker->name(),
            'domicile' => $this->faker->word(),
            'aadhar_number' => $this->faker->word(),
            'pan_number' => $this->faker->word(),
            'nationality' => $this->faker->word(),
            'religion' => $this->faker->word(),
            'father_occupation' => $this->faker->word(),
            'yearly_income' => $this->faker->word(),
            'permanent_address' => $this->faker->address(),
            'temp_address' => $this->faker->address(),
            'is_expelled_before' => $this->faker->boolean(),
            'expulsion_reason' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
