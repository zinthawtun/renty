@extends('layouts.app')


@section('content')
    <div class="card-body">
      <div class="bg-danger" align="center">
          <br><br>
        <h2 class="headline text-info"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
            <p>
                We could not find the page.
                You may <a href="/home">return to Home page</a>.
            </p>
            <br><br>
        </div>
      </div>
    </div>
@endsection