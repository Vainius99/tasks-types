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
                    <form class="white form-group" action="{{route('paginationsetting.store')}}" method="post">
                        <div class="form-group row">
                            <label for="pagination_title" class="col-md-4 col-form-label text-md-right"> Title: </label>
                            <input class="gray form-control col-md-6 @error('pagination_title') is-invalid @enderror" type="text" name="pagination_title" placeholder="" />
                        </div>
                        <div class="form-group row">
                            <label for="pagination_value" class="col-md-4 col-form-label text-md-right"> Value: </label>
                            <input class="gray form-control col-md-6 @error('pagination_value') is-invalid @enderror" type="text" name="pagination_value" placeholder="" />
                        </div>
                        {{-- <div class="form-group row">
                            <label for="pagination_visible" class="col-md-4 col-form-label text-md-right"> Visibility: </label>
                            <input class="gray form-control col-md-6 @error('pagination_visible') is-invalid @enderror" type="text" name="pagination_visible" placeholder="" />
                        </div> --}}
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/paginationsettings')}}">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
