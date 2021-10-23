@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>
                    <form class="white form-group" action="{{route('task.store')}}" method="post">
                        <div class="form-group row">
                            <label for="task_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6" type="text" name="task_title" placeholder="Enter Task Title" />
                        </div>
                        <div class="form-group row">
                            <label for="task_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="task_description" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_type_id" class="col-md-4 col-form-label text-md-right"> Type: </label>
                            <select class="form-control col-md-6" name="task_type_id">
                                @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="task_start_date" class="col-md-4 col-form-label text-md-right"> Start: </label>
                            <input class="gray form-control col-md-6" type="date" name="task_start_date" placeholder="Enter Start Time" />
                        </div>
                        <div class="form-group row">
                            <label for="task_end_date" class="col-md-4 col-form-label text-md-right"> End: </label>
                            <input class="gray form-control col-md-6" type="date" name="task_end_date" placeholder="Enter End Time" />
                        </div>
                        <div class="form-group row">
                            <label for="task_logo" class="col-md-4 col-form-label text-md-right"> Logo: </label>
                            <input class="gray form-control col-md-6" type="text" name="task_logo" placeholder="Enter Logo" />
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create Task</button>
                </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/tasks')}}">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
            $(document).ready(function() {
                $('.summernote').summernote();
            });
        </script>

@endsection
