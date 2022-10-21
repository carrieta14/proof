@php $editing = isset($course) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $course->name : ''))"
            maxlength="99999999"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="level"
            label="Level"
            :value="old('level', ($editing ? $course->level : ''))"
            max="10"
            placeholder="Level"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="hours"
            label="Hours"
            :value="old('hours', ($editing ? $course->hours : ''))"
            max="4"
            placeholder="Hours"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="teacher_id" label="Teacher" required>
            @php $selected = old('teacher_id', ($editing ? $course->teacher_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Teacher</option>
            @foreach($teachers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.students.name')</h4>

        @foreach ($students as $student)
        <div>
            <x-inputs.checkbox
                id="student{{ $student->id }}"
                name="students[]"
                label="{{ ucfirst($student->firstName) }} {{ ucfirst($student->lastName) }}"
                value="{{ $student->id }}"
                :checked="isset($course) ? $course->students()->where('id', $student->id)->exists() : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
