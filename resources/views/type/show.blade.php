@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Type Info') }}</div>
                    <div class="card-body">
                        <div class="form-group center">
                            <p> ID Number: {{$type->id}}</p>
                        </div>
                        <div class="form-group center">
                            <p> Title: {{$type->title}}</p>
                        </div>
                        <div class="form-group center">
                            <p>Description: {{$type->description}}</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
