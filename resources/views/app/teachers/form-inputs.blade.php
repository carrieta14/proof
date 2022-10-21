@php $editing = isset($teacher) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="firstName"
            label="First Name"
            :value="old('firstName', ($editing ? $teacher->firstName : ''))"
            maxlength="255"
            placeholder="First Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="lastName"
            label="Last Name"
            :value="old('lastName', ($editing ? $teacher->lastName : ''))"
            maxlength="255"
            placeholder="Last Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $teacher->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $teacher->phone : ''))"
            max="9999999"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="departament"
            label="Departament"
            :value="old('departament', ($editing ? $teacher->departament : ''))"
            maxlength="255"
            placeholder="Departament"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
