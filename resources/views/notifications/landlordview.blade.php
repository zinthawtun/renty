@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($user = auth()->user())
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{$user->role->name}}  Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                                @if($user->role->name == 'Landlord')
                                    <h5  class=""> Properties</h5>
                                    <div class="jumbotron">

                                        @foreach($users as $tenant)
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$tenant->name}}</h5>
                                                    <p class="card-text">{{$tenant->email}}</p>
                                                    <br>

                                                    <form action="{{ route('disconnect.P',$tenant->id) }}" method="POST">

                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-sm btn-danger">Disconnect</button>
                                                    </form>
                                                    <br>

                                                        <a class="btn btn-sm btn-dark"  href="{{route('Messages', $tenant->id)}}" role="button">Messages</a>

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
