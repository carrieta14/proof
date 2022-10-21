<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

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
            'phone' => $this->faker->randomNumber(0),
            'departament' => $this->faker->text(255),
        ];
    }
}
