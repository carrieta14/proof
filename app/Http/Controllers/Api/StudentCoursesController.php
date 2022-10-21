<?php
namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;

class StudentCoursesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Student $student)
    {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $courses = $student
            ->courses()
            ->search($search)
            ->latest()
            ->paginate();

        return new CourseCollection($courses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student, Course $course)
    {
        $this->authorize('update', $student);

        $student->courses()->syncWithoutDetaching([$course->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student, Course $course)
    {
        $this->authorize('update', $student);

        $student->courses()->detach($course);

        return response()->noContent();
    }
}
