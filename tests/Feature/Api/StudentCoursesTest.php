<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentCoursesTest extends TestCase
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
    public function it_gets_student_courses()
    {
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $student->courses()->attach($course);

        $response = $this->getJson(
            route('api.students.courses.index', $student)
        );

        $response->assertOk()->assertSee($course->name);
    }

    /**
     * @test
     */
    public function it_can_attach_courses_to_student()
    {
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $response = $this->postJson(
            route('api.students.courses.store', [$student, $course])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $student
                ->courses()
                ->where('courses.id', $course->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_courses_from_student()
    {
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        $response = $this->deleteJson(
            route('api.students.courses.store', [$student, $course])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $student
                ->courses()
                ->where('courses.id', $course->id)
                ->exists()
        );
    }
}
