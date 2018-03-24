@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post A Short Message</div>

                    @if (session('warning'))
                        <div class="alert alert-danger">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="post" action="{{ route('properties.update', $property->id)}}">
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <textarea id="title" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"  required autofocus>{{ $property->address }}</textarea>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Post Code</label>

                                <div class="col-md-3">
                                    <input id="title" type="text" class="form-control{{ $errors->has('post_code') ? ' is-invalid' : '' }}" name="post_code" value="{{ $property->post_code }}" required autofocus>
                                    @if ($errors->has('post_code'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('post_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tenant_no" class="col-md-4 col-form-label text-md-right">Number of Tenants</label>

                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control{{ $errors->has('tenant_no') ? ' is-invalid' : '' }}" name="tenant_no" value="{{ $property->tenant_no }}" required autofocus>

                                    @if ($errors->has('tenant_no'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tenant_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <select name="type" class="form-control" id="type">
                                        @if($types->count())
                                                <option value="{{$property->type->id}}">{{$property->type->name}}</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach

                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="style" class="col-md-4 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <select name="style" class="form-control" id="style">
                                        @if($styles->count())
                                            <option value="{{$property->style->id}}">{{$property->style->name}}</option>
                                            @foreach($styles as $style)
                                                <option value="{{$style->id}}">{{$style->name}}</option>
                                            @endforeach

                                        @endif
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Post
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
