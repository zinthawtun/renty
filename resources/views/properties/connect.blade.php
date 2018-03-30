@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Connect to your property</div>

                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('connect.connect')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Property Key (secret key)</label>

                                <div class="col-md-4">
                                    <input id="p_key" type="text" class="form-control{{ $errors->has('property_key') ? ' is-invalid' : '' }}" name="property_key" value="{{ old('property_key') }}" required autofocus>

                                    @if ($errors->has('property_key'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('property_key')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                      <b>Connect</b>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
