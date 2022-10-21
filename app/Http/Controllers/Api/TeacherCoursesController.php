<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseCollection;

class TeacherCoursesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Teacher $teacher)
    {
        $this->authorize('view', $teacher);

        $search = $request->get('search', '');

        $courses = $teacher
            ->courses()
            ->search($search)
            ->latest()
            ->paginate();

        return new CourseCollection($courses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Teacher $teacher)
    {
        $this->authorize('create', Course::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'level' => ['required', 'numeric'],
            'hours' => ['required', 'numeric'],
        ]);

        $course = $teacher->courses()->create($validated);

        return new CourseResource($course);
    }
}
