<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'level' => $this->faker->randomNumber,
            'hours' => $this->faker->randomNumber(0),
            'teacher_id' => \App\Models\Teacher::factory(),
        ];
    }
}
