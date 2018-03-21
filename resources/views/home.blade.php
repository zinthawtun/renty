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
                        <h2 class="display-3">Hello {{$user->name}}</h2>
                        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        @if($user->role->name == 'Landlord')
                            <p><a class="btn btn-sm btn-success" href="{{route('boards.create')}}" role="button">Post New Message</a></p>
                            <p><a class="btn btn-sm btn-success" href="{{route('boards.show', $user->id)}}" role="button">Show my posts</a></p>
                        @endif
                        <p><a class="btn btn-sm btn-primary" href="{{route('boards.index') }}" role="button">See Announcements</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
