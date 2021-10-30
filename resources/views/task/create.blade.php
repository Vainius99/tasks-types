@extends('layouts.app')

@section('content')

<div class="container">

    @if ($errors->any())


        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
        @endforeach
    @endif

@error('task_title')
    <div class="btn btn-danger">
        {{$message}}
    </div>
@enderror

{{-- @error('description')
    <div class="btn btn-danger">
        {{$message}}
    </div>
@enderror --}}


    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create') }} </div>
                    <form class="white form-group" action="{{route('task.store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="task_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6 @error('task_title') is-invalid @enderror" required="required" type="text" name="task_title" value="" />
                            @error('task_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="task_owner_id" class="col-md-4 col-form-label text-md-right"> Owner: </label>
                            <select class="form-control col-md-6 @error('task_owner_id') is-invalid @enderror" name="task_owner_id">
                                @foreach ($owners as $owner)
                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="task_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote @error('task_description') is-invalid @enderror" name="task_description" cols="5" rows="5"></textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="task_type_id" class="col-md-4 col-form-label text-md-right"> Type: </label>
                            <select class="form-control col-md-6 @error('task_types_id') is-invalid @enderror" name="task_type_id">
                                @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="task_start_date" class="col-md-4 col-form-label text-md-right @error('start_date') is-invalid @enderror"> Start: </label>
                            <input class="gray form-control col-md-6" type="date" name="task_start_date" placeholder="Enter Start Time" />
                        </div>
                        <div class="form-group row">
                            <label for="task_end_date" class="col-md-4 col-form-label text-md-right @error('end_date') is-invalid @enderror"> End: </label>
                            <input class="gray form-control col-md-6" type="date" name="task_end_date" placeholder="Enter End Time" />
                            @error('end_date')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="task_logo" class="col-md-4 col-form-label text-md-right"> Logo: </label>
                            <input class="gray form-control col-md-6 @error('task_logo') is-invalid @enderror" type="file" name="task_logo" placeholder="Enter Logo" />
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
