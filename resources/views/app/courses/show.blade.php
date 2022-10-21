@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('courses.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                @lang('crud.courses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.courses.inputs.name')</h5>
                    <span>{{ $course->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.courses.inputs.level')</h5>
                    <span>{{ $course->level ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.courses.inputs.hours')</h5>
                    <span>{{ $course->hours ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.courses.inputs.teacher_id')</h5>
                    <span>{{ optional($course->teacher)->firstName ?? '-'
                        }} {{ optional($course->teacher)->lastName ?? '-'
                        }}</span>
                </div>
                 <div class="mb-4">
                    <h5>Students</h5>
                        @foreach ($course->students()->getResults() as $student)
                            <span>
                                {{optional($student)->firstName ?? '-'
                                }} {{optional($student)->lastName ?? '-'
                                }} <br>
                            </span>
                        @endforeach
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('courses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Course::class)
                <a href="{{ route('courses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection