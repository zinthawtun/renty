@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card" style="width: 35rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$property->post_code}}</h5>
                            <p class="card-text">{{$property->address}}</p>
                            <a class="btn btn-sm btn-light" href="{{route('home')}}" role="button">Back Home</a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
@endsection
