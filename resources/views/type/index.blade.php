@extends('layouts.app')

@section('content')

<div class="container">
    <a style="color:rgb(121, 95, 26);" href="{{ url('/types/create')}}">Create Type</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
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

        @foreach ($types as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td><a class="intgray" href="{{route('type.show', [$type])}}">{{ $type->title }}</a></td>
            <td>{!! $type->description !!}</td>
            <td>
                <a class="btn btn-dark intgray" href="{{route('type.edit', [$type]) }}">Edit</a>
                <form method="post" action="{{route('type.destroy', [$type]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
