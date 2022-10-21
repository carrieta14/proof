<?php
namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentCollection;

class CourseStudentsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course)
    {
        $this->authorize('view', $course);

        $search = $request->get('search', '');

        $students = $course
            ->students()
            ->search($search)
            ->latest()
            ->paginate();

        return new StudentCollection($students);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course, Student $student)
    {
        $this->authorize('update', $course);

        $course->students()->syncWithoutDetaching([$student->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course, Student $student)
    {
        $this->authorize('update', $course);

        $course->students()->detach($student);

        return response()->noContent();
    }
}
