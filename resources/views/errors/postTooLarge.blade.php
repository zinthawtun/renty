@extends('layouts.app')


@section('content')
    <div class="card-body">
        <div class="bg-danger" align="center">
            <br><br>
            <h2 class="headline text-info">Something got wrong!!!</h2>
            <div class="error-content">
                <p>
                   Your file size is too large to upload.
                    You may <a href="/profile">return to Profile page</a>.
                </p>
                <br><br>
            </div>
        </div>
    </div>
@endsection