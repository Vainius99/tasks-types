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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>
                    <form class="white form-group" action="{{route('type.store')}}" method="post">
                        <div class="form-group row">
                            <label for="type_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6 @error('type_title') is-invalid @enderror" type="text" name="type_title" placeholder="Enter type Title" />
                                @error('type_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="type_description" class="col-md-4 col-form-label text-md-right"> Description: </label>
                            <div class="col-md-6">
                                <textarea class="summernote @error('type_description') is-invalid @enderror" name="type_description" cols="5" rows="5"></textarea>
                                    @error('type_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create Type</button>
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
