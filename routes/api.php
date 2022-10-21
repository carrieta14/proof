<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\StudentCoursesController;
use App\Http\Controllers\Api\TeacherCoursesController;
use App\Http\Controllers\Api\CourseStudentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('students', StudentController::class);

        // Student Courses
        Route::get('/students/{student}/courses', [
            StudentCoursesController::class,
            'index',
        ])->name('students.courses.index');
        Route::post('/students/{student}/courses/{course}', [
            StudentCoursesController::class,
            'store',
        ])->name('students.courses.store');
        Route::delete('/students/{student}/courses/{course}', [
            StudentCoursesController::class,
            'destroy',
        ])->name('students.courses.destroy');

        Route::apiResource('teachers', TeacherController::class);

        // Teacher Courses
        Route::get('/teachers/{teacher}/courses', [
            TeacherCoursesController::class,
            'index',
        ])->name('teachers.courses.index');
        Route::post('/teachers/{teacher}/courses', [
            TeacherCoursesController::class,
            'store',
        ])->name('teachers.courses.store');

        Route::apiResource('courses', CourseController::class);

        // Course Students
        Route::get('/courses/{course}/students', [
            CourseStudentsController::class,
            'index',
        ])->name('courses.students.index');
        Route::post('/courses/{course}/students/{student}', [
            CourseStudentsController::class,
            'store',
        ])->name('courses.students.store');
        Route::delete('/courses/{course}/students/{student}', [
            CourseStudentsController::class,
            'destroy',
        ])->name('courses.students.destroy');
    });
