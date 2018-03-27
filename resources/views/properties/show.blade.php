@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @foreach ($boards as $board)
            <div class="card text-white bg-{{$board->category->type}} mb-md-3">
                <div class="card-header">{{$board->category->name}} &nbsp; &nbsp; {{$board->updated_at}} &nbsp;&nbsp; posted by &nbsp; &nbsp;&nbsp; &nbsp; {{$board->user->name}} </div>
                <div class="card-body">
                    <h5 class="card-title">{{$board->title}}</h5>
                    <p class="card-text">{{$board->content}}</p>
                    <form action="{{ route('boards.destroy',$board->id) }}" method="POST">



                        <a class="btn btn-sm btn-light" href="{{route('boards.edit', $board->id)}}" role="button">Edit</a> &nbsp;&nbsp;

                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach


        <nav>
            <ul class="pagination justify-content-end">
                {{ $boards->links() }}
            </ul>
        </nav>
    </div>

@endsection