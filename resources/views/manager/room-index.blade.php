@extends('manager.layout')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Movie Rooms</h1>
    
@if ($room->isNotEmpty())
<table class="showtime-table table table-striped table-hover rounded">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Room ID</th>
            <th scope="col">Room Name</th>
            <th scope="col">Room Size</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    @foreach ($room as $rooms)
    <tr>
        <th>{{ $rooms->id }}</th>
       
        <td>{{ $rooms->title }}</td>
        <td>{{ $rooms->size }}</td>
        <td>
            <a href="{{ route('manager.room.edit',$rooms->id) }}"
               class="btn btn-warning text-white">Edit</a>
        </td>
        <td>
            <form action="{{ route('manager.room.destroy',$rooms->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger text-white"
                       type="submit"
                       value="Delete">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@else
<div class="bg-light p-3 font-weight-bold rounded text-center">
    There are currently no Rooms.
</div>
@endif
@include('components.flash-message')
@endsection