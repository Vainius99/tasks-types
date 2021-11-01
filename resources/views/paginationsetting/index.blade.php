@extends('layouts.app')

@section('content')

<div class="container">
    <a style="color:rgb(121, 95, 26);" href="{{ url('/paginationsetings/create')}}">Create</a>
    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            {{-- <th>ID</th>
            <th>Title</th> --}}
            <th>@sortablelink('id', 'ID')</th>
            <th>Title</th>
            <th>Value/th>
            <th>Visability</th>
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

        @foreach ($paginatonSettings as $paginatonSetting)
        <tr>
            <td>{{ $paginatonSetting->id }}</td>
            <td><a class="intgray" href="{{route('paginationsetting.show', [$paginatonSetting])}}">{{ $paginatonSetting->title }}</a></td>
            <td>{{ $paginatonSetting->value }}</td>
            <td>{{ $paginatonSetting->visible }}</td>
            <td>
                <a class="btn btn-dark intgray" href="{{route('paginationsetting.edit', [$paginatonSetting]) }}">Edit</a>
                <form method="post" action="{{route('paginationsetting.destroy', [$paginatonSetting]) }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- {!! $paginatonSettings->appends(Request::except('page'))->render() !!} --}}
</div>
@endsection
