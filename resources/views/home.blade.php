@extends('layouts.app')

@section('content')
<div class="container">
    @if ($user = auth()->user())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->role->name}}  Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="jumbotron">
                        <h5 class="display-5">Hello {{$user->name}}</h5>
                        <div class="text-center m-sm-auto">
                         <p>  <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="rounded" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"></p>
                        </div>
                        <div class="m-sm-auto">
                         <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        @if($user->role->name == 'Landlord')
                            <p><a class="btn btn-sm btn-dark" href="{{route('boards.create')}}" role="button">Post New Message</a></p>
                            <p><a class="btn btn-sm btn-dark" href="{{route('boards.show', $user->id)}}" role="button">Show my posts</a></p>
                            <p><a class="btn btn-sm btn-dark" href="{{route('properties.create')}}" role="button">Create Property</a></p>
                        @endif
                            <p><a class="btn btn-sm btn-primary" href="{{route('boards.index') }}" role="button">See Announcements</a></p>
                        </div>
                    </div>
                        @if($user->role->name == 'Landlord')
                            <h5  class=""> Properties</h5>
                        <div class="jumbotron">

                            @foreach($properties as $property)
                                <div class="card" style="width: 35rem;">

                                    <div class="card-body">
                                        <h5 class="card-title">{{$property->post_code}}</h5>
                                        <p class="card-text">{{$property->address}}</p>
                                        <a class="btn btn-sm btn-light" href="{{route('properties.edit', $property->id)}}" role="button">Edit</a>
                                    </div>
                                </div>
                                <br>
                            @endforeach

                        </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
