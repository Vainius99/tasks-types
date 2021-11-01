@extends('layouts.app')

@section('content')

<div class="container">
    <a style="color:rgb(121, 95, 26);" href="{{ url('/owners/create')}}">Create Owner</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            {{-- <th>ID</th>
            <th>Title</th> --}}
            <th>@sortablelink('id', 'ID')</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>

        @if(session()->has('error_message'))
            <div class="alert alert-danger">
                {{session()->get("error_message")}}
            </div>
        @endif

        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get("success_message")}}
            </div>
        @endif

        @foreach ($owners as $owner)
        <tr>
            <td>{{ $owner->id }}</td>
            <td><a class="intgray" href="{{route('owner.show', [$owner])}}">{{ $owner->name }}</a></td>
            <td>{{ $owner->surname }}</td>
            <td>{{ $owner->email }}</td>
            <td>{{ $owner->phone }}</td>
            <td>
                <a class="btn btn-dark intgray" href="{{route('owner.edit', [$owner]) }}">Edit</a>
                <form method="post" action="{{route('owner.destroy', [$owner]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a class="btn btn-success" href="{{route('owner.pdf')}}"> Export Owner table to PDF </a>

    {!! $owners->appends(Request::except('page'))->render() !!}
</div>
@endsection
