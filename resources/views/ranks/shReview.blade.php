@extends('layouts.app2')

@section('content')
    @include('layouts.extra')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form action="{{ route('reviews.post') }}" method="post">
                           @csrf
                            <div class="card">
                                <div class="container-fliud">
                                    <div class="wrapper row">

                                        <div class="details col-md-6">
                                            <h3 class="product-title">Ratting User</h3>
                                            <div class="rating">

                                                <h3>{{$review->name}}</h3>
                                                <img src="/uploads/avatars/{{ $review->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                                                <p>{{$review->email}}</p>
                                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $review->userAverageRating }}" data-size="xs">
                                                <input type="hidden" name="id" required="" value="{{ $review->id }}">
                                                <br/>
                                                <button class="btn btn-dark">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#input-id").rating();
    </script>
@endsection