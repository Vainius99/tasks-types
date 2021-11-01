@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{route('task.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button type="submit">Search</button>
    </form>

    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('title', 'Title')</th>
            <th>@sortablelink('description', 'Description')</th>
            <th>@sortablelink('type_id', 'Type')</th>
            <th>Start</th>
            <th>End</th>
            <th>Logo</th>
            <th>Action</th>

        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td> {{$task->id }}</td>
                <td> {{$task->title }}</td>
                <td> {!!$task->description !!}</td>
                <td>{{$task->taskTypes->title}}
                    {{-- {{$task->taskTypes->description}} --}}
                </td>
                <td>{{ $task->start_date }}</td>
                <td>{{ $task->end_date }}</td>
                <td>{{ $task->logo }}</td>
                <td>
                    <div class="row">
                        <a class="btn btn-dark intgray" href="{{route('task.edit', [$task]) }}">Edit</a>
                        <form method="post" action="{{route('task.destroy', [$task]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </td>

            </tr>
        @endforeach
    </table>
    <a class="btn btn-link"style="color: red" href="{{ url('/tasks')}}">Back</a>

    {!! $tasks->appends(Request::except('page'))->render() !!}
</div>
@endsection
