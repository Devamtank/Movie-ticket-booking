@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Room: {{ $room->title }}</h1>

<form action="{{ route('manager.room.update', $room->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="row">
        @include('components.form-input', [
            'name' => 'title',
            'label' => 'Room Title',
            'type' => 'text',
            'classes' => 'col-12',
            'value' => old('title', $room->title),
            'required' => 'required'
        ])

        @include('components.form-input', [
            'name' => 'size',
            'label' => 'Room Size',
            'type' => 'text',
            'classes' => 'col-12',
            'value' => old('size', $room->size),
            'required' => 'required'
        ])
    </div>

    <div class="row justify-content-start">
        <input class="btn btn-warning m-2" type="reset" value="Reset">
        <input class="btn btn-success m-2" type="submit" value="Update Room">
    </div>
</form>

@include('components.flash-message')
@endsection
