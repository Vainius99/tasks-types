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
                    <form class="white form-group" action="{{route('owner.store')}}" method="post">
                        <div class="form-group row">
                            <label for="owner_name" class="col-md-4 col-form-label text-md-right"> Name: </label>
                            <input class="gray form-control col-md-6 @error('owner_name') is-invalid @enderror" type="text" name="owner_name" placeholder="Enter Owner Name" />
                        </div>
                        <div class="form-group row">
                            <label for="owner_surname" class="col-md-4 col-form-label text-md-right"> Surname: </label>
                            <input class="gray form-control col-md-6 @error('owner_surname') is-invalid @enderror" type="text" name="owner_surname" placeholder="Enter Owner Surame" />
                        </div>
                        <div class="form-group row">
                            <label for="owner_email" class="col-md-4 col-form-label text-md-right"> Email: </label>
                            <input class="gray form-control col-md-6 @error('owner_email') is-invalid @enderror" type="text" name="owner_email" placeholder="Enter Owner Email" />
                        </div>
                        <div class="form-group row">
                            <label for="owner_phone" class="col-md-4 col-form-label text-md-right"> Phone: </label>
                            <input class="gray form-control col-md-6 @error('owner_phone') is-invalid @enderror" type="text" name="owner_phone" placeholder="Enter Owner Phone" />
                        </div>
                    @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create Owner</button>
                </form>
                                <a class="btn btn-link"style="color: red" href="{{ url('/owners')}}">Back</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
