@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>
                    <form class="white form-group" action="{{route('type.update', [$type])}}" method="post">
                        <div class="form-group row">
                            <label for="type_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6" type="text" name="type_title" value="{{$type->title}}" />
                        </div>
                        <div class="form-group row">
                            <label for="type_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="type_description" cols="5" rows="5">{{$type->description}}</textarea>
                            </div>
                        </div>

                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Edit Type</button>
                </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/types')}}">Back</a>

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
