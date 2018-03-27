@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($user = auth()->user())
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <a class="btn btn-sm btn-dark"  href="{{route('createMessages', $pid)}}" role="button" align="left">Create</a>
                @foreach ($messages as $mes)
                        <div class="card-header">{{$mes->n_type->name}} &nbsp; &nbsp; {{$mes->updated_at}} &nbsp;&nbsp; </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$mes->$message}}</h5>
                        </div>
                @endforeach


                <nav>
                    <ul class="pagination justify-content-end">
                        {{ $messages->links() }}
                    </ul>
                </nav>
            </div>
        @endif
    </div>
@endsection