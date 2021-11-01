@extends('layouts.app')

@section('content')

<div class="container">
    <a style="color:rgb(121, 95, 26);" href="{{ url('/tasks/create')}}">Create Task</a><br>
    <div class="row col-5">
        <form action="{{route('task.search')}}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Enter search key" />
            <button type="submit">Search</button>
        </form>

        <form action="{{route('task.index')}}" method="GET">
            @csrf
            <select name="collumname">

                @if ($collumName == 'id')
                    <option value="id" selected>ID</option>
                @else
                    <option value="id">ID</option>
                @endif


                @if ($collumName == 'title')
                <option value="title" selected>Title</option>
                @else
                    <option value="title">Title</option>
                @endif

                @if ($collumName == 'owner_id')
                    <option value="owner_id" selected>Owner Name</option>
                @else
                    <option value="owner_id">Owner Name</option>
                @endif

                @if ($collumName == 'description')
                    <option value="description" selected>Description</option>
                @else
                    <option value="description">Description</option>
                @endif

                @if ($collumName == 'type_id')
                    <option value="type_id" selected>Type</option>
                @else
                    <option value="type_id">Type</option>
                @endif

                @if ($collumName == 'start_date')
                    <option value="start_date" selected>Start</option>
                @else
                    <option value="start_date">Start</option>
                @endif
                @if ($collumName == 'end_date')
                    <option value="end_date" selected>End</option>
                @else
                    <option value="end_date">End</option>
                @endif

            </select>

            <select name="sortby">
                @if ($sortby == "asc")
                    <option value="asc" selected>ASC</option>
                    <option value="desc">DESC</option>
                @else
                    <option value="asc">ASC</option>
                    <option value="desc" selected>DESC</option>
                @endif
            </select>

            <label for="">Page limit</label>
                <select name="pagination" class="form-control-sm">
                    @foreach ($pages as $page)
                        @if($page->visible==1)
                        <option value="{{$page->value}}" @if($page->value == $pagination) selected @endif > {{$page->title}}</option>

                        @endif
                    @endforeach
                </select>


            <button class="btn btn-warning" type="submit">SORT</button>

        </form>
    </div>
    <div class="col-5 row">
        <form action="{{route('task.filter')}}" method="GET">
            <select class="form-control" name="type_sort">
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->title}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-warning">Type sort</button>
    </div>
    <div class="col-5 row">
        </form>
    </div>

    <table class="table table-bordered table-hover gray">
        <thead class="thead-dark">
        <tr>
            <th>{{_('ID')}}</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Description</th>
            <th>Type</th>
            <th>Start</th>
            <th>End</th>
            <th>Logo</th>
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

        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td><a class="intgray" href="{{route('task.show', [$task])}}">{{ $task->title }}</a></td>
            <td>{{$task->taskOwners->name}}
                {{$task->taskOwners->surname}}
            </td>
            <td>{!! $task->description !!}</td>
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
    <a class="btn btn-success" href="{{route('task.pdf')}}"> Export task table to PDF </a>
    {{-- <a class="btn btn-dark" href="{{route('task.statistics')}}"> Export statistics to pdf </a> --}}
    {{-- {{ $tasks->links() }} --}}

    {!! $tasks->appends(Request::except('page'))->render() !!}
    <span> Is viso : {{ \App\Models\Task::all()->count() }} uzduociu</span>


</div>

@endsection
