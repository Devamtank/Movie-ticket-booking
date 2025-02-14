@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Create a New Room</h1>

<form action="{{ route('manager.room.store') }}" method="POST">
    @csrf

    <div class="row">
        @include('components.form-input', [
            'name' => 'title',
            'label' => 'Room Title',
            'type' => 'text',
            'classes' => 'col-12',
            'required' => 'required',
            'value' => old('title'),
        ])

        @include('components.form-input', [
            'name' => 'size',
            'label' => 'Room Size',
            'type' => 'text',
            'classes' => 'col-12',
            'required' => 'required',
            'value' => old('size'),
        ])
    </div>

    <div class="row justify-content-start">
        <input class="btn btn-warning m-2" type="reset" value="Reset">
        <input class="btn btn-primary m-2" type="submit" value="Create Room">
    </div>
</form>

@include('components.flash-message')
@endsection
