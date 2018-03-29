@extends('layouts.app2')

@section('content')

    @include('layouts.script')

    @include('layouts.extra')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Rates</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table ">
                            <tr class="thead-dark">
                                <th>Name</th>
                                <th width="400px">Star</th>
                                <th width="100px">View</th>
                            </tr>
                            @if($trates!=null)
                                @foreach($trates as $rate)
                                    <tr>

                                        <td>{{$rate->name }}</td>
                                        <td>
                                            <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $rate->averageRating }}" data-size="xs" disabled="">
                                        </td>
                                        <td>
                                            @if(count($rate->is_set))
                                                <a class="btn btn-primary btn-sm" disabled>Done</a>
                                            @else
                                                <a href="{{ route('reviews.show',$rate->id) }}" class="btn btn-primary btn-sm" >View</a>
                                            @endif()
                                        </td>


                                    </tr>
                                @endforeach
                            @endif

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#input-id").rating();
    </script>

@endsection