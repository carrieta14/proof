@php $editing = isset($student) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="firstName"
            label="First Name"
            :value="old('firstName', ($editing ? $student->firstName : ''))"
            maxlength="255"
            placeholder="First Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="lastName"
            label="Last Name"
            :value="old('lastName', ($editing ? $student->lastName : ''))"
            maxlength="255"
            placeholder="Last Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $student->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="semester"
            label="Semester"
            :value="old('semester', ($editing ? $student->semester : ''))"
            max="10"
            placeholder="Semester"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="career"
            label="Career"
            :value="old('career', ($editing ? $student->career : ''))"
            maxlength="255"
            placeholder="Career"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
