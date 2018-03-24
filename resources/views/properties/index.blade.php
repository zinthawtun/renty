@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @foreach ($properties as $property)
        <div class="card text-white bg-{{$property->address}} mb-md-3">
            {{--<div class="card-header">{{$property->category->name}} &nbsp; &nbsp; {{$property->updated_at}} &nbsp;&nbsp; posted by &nbsp; &nbsp;&nbsp; &nbsp; {{$property->user->name}} </div>--}}
            <div class="card-body">
                <h5 class="card-title">{{$property->tenant_no}}</h5>
                {{--<p class="card-text">{{$property->content}}</p>--}}
            </div>
        </div>
    @endforeach


<nav>
    <ul class="pagination justify-content-end">
{{ $properties->links() }}
    </ul>
</nav>
</div>

@endsection