<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseStudentsTest extends TestCase
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
    public function it_gets_course_students()
    {
        $course = Course::factory()->create();
        $student = Student::factory()->create();

        $course->students()->attach($student);

        $response = $this->getJson(
            route('api.courses.students.index', $course)
        );

        $response->assertOk()->assertSee($student->firstName);
    }

    /**
     * @test
     */
    public function it_can_attach_students_to_course()
    {
        $course = Course::factory()->create();
        $student = Student::factory()->create();

        $response = $this->postJson(
            route('api.courses.students.store', [$course, $student])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $course
                ->students()
                ->where('students.id', $student->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_students_from_course()
    {
        $course = Course::factory()->create();
        $student = Student::factory()->create();

        $response = $this->deleteJson(
            route('api.courses.students.store', [$course, $student])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $course
                ->students()
                ->where('students.id', $student->id)
                ->exists()
        );
    }
}
