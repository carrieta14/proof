@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('students.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.students.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.firstName')</h5>
                    <span>{{ $student->firstName ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.lastName')</h5>
                    <span>{{ $student->lastName ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.email')</h5>
                    <span>{{ $student->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.semester')</h5>
                    <span>{{ $student->semester ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.career')</h5>
                    <span>{{ $student->career ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('students.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Student::class)
                <a href="{{ route('students.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
