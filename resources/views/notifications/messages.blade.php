@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('Messages', $id)}}" role="tab">Sent Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('Messages2', $id)}}" role="tab" >Receive Messages</a>
        </li>

    </ul>

    <br>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        @if ($user = auth()->user())
            <div class="container">
                <div class="row">
                    <a class="btn btn-sm btn-dark" href="{{route('createMessages', $id)}}" role="button" align="left">Write
                        Something</a>
                </div>

                <br>
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="sent">

                        @foreach ($s_messages as $mes)
                            <br>
                            <div class="card-header"> &nbsp; &nbsp; {{$mes->updated_at}} &nbsp;&nbsp;</div>
                            <div class="card-body">
                                <p> {{$mes->message}} </p>
                                <p>This message is : @if($mes->n_id == 1) Urgent Response @else Basic @endif </p>
                            </div>


                            <form action="{{ route('deleteMessages',$mes->id) }}" method="POST">



                                <p><a class="btn btn-sm btn-dark" href="{{route('editMessages', $mes->id)}}" role="button"
                                      align="left">Edit</a></p>

                                @csrf
                                @method('DELETE')


                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        @endforeach
                            <nav>
                                <ul class="pagination justify-content-end">
                                    {{ $s_messages->links() }}
                                </ul>
                            </nav>

                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection