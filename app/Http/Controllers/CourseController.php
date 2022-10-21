<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;

class CourseController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Course::class);

        $search = $request->get('search', '');

        $courses = Course::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.courses.index', compact('courses', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Course::class);

        $teachers = Teacher::pluck('firstName', 'id');

        $students = Student::get();

        return view('app.courses.create', compact('teachers', 'students'));
    }

    /**
     * @param \App\Http\Requests\CourseStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $this->authorize('create', Course::class);

        $validated = $request->validated();

        $course = Course::create($validated);

        $course->students()->attach($request->students);

        return redirect()
            ->route('courses.edit', $course)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Course $course)
    {
        $this->authorize('view', $course);

        return view('app.courses.show', compact('course'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $teachers = Teacher::pluck('firstName', 'id');

        $students = Student::get();

        return view(
            'app.courses.edit',
            compact('course', 'teachers', 'students')
        );
    }

    /**
     * @param \App\Http\Requests\CourseUpdateRequest $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $this->authorize('update', $course);

        $validated = $request->validated();
        $course->students()->sync($request->students);

        $course->update($validated);

        return redirect()
            ->route('courses.edit', $course)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Course $course)
    {
        $this->authorize('delete', $course);

        $course->delete();

        return redirect()
            ->route('courses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
