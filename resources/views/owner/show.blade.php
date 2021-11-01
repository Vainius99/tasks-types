@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Owner Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$owner->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Name: {{$owner->name}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Surname: {{$owner->surname}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Email: {{$owner->email}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Phone: {{$owner->phone}}</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <a href="{{route('owner.pdfowner', [$owner])}}" class="btn btn-success">Export Owner PDF</a>

@endsection
