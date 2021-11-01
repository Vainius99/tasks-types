@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('task Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$task->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Title: {{$task->title}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Description: {{$task->description}}</p>
                        </div>
                        <div class="form-group center">
                            <p>start: {{$task->start_date}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Edn: {{$task->end_date}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Logo: {{$task->logo}}</p>
                        </div>
                        <div class="card-header gray">{{ __('Task Type') }}</div>
                        <div class="form-group center">
                            <p>{{$task->taskTypes->title}} <br>
                                {{$task->taskTypes->description}}<br>
                        </div>

                        <a href="{{route('task.pdftask', [$task])}}" class="btn btn-success">Export Task PDF</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
