<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->text(255),
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->email,
            'semester' => $this->faker->randomNumber(0),
            'career' => $this->faker->text(255),
        ];
    }
}
