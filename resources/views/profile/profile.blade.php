@extends('layouts.app')

@section('content')

    @include('layouts.script')

    <!--suppress ALL -->
    <div class="container">
        <div class="row">
            @if (count($errors) > 0)

                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                </div>

            @endif

            <div class="col-md-10 col-md-offset-1">

                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                <h2>{{ $user->name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="/profile" method="POST">

                    <label>Update Profile Image</label>
                    <input type="file" id="file" name="avatar">
                    <div id="file-selected"></div>
                    @csrf
                    <input type="submit" id="but1" class="pull-right btn btn-sm btn-primary">
                    <a class="btn btn-sm btn-light border-left" href="{{route('profileEdit', $user->id)}}" role="button">Edit Profile</a> &nbsp;
                </form>
            </div>
        </div>
    </div>

@endsection