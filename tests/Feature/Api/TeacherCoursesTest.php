<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherCoursesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_teacher_courses()
    {
        $teacher = Teacher::factory()->create();
        $courses = Course::factory()
            ->count(2)
            ->create([
                'teacher_id' => $teacher->id,
            ]);

        $response = $this->getJson(
            route('api.teachers.courses.index', $teacher)
        );

        $response->assertOk()->assertSee($courses[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_teacher_courses()
    {
        $teacher = Teacher::factory()->create();
        $data = Course::factory()
            ->make([
                'teacher_id' => $teacher->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.teachers.courses.store', $teacher),
            $data
        );

        $this->assertDatabaseHas('courses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $course = Course::latest('id')->first();

        $this->assertEquals($teacher->id, $course->teacher_id);
    }
}
