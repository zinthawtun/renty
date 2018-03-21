@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post A Short Message</div>

                    <div class="card-body">
                        <form method ="post" action="{{ route('boards.update', $id)}}}">
                            @csrf
                            @method('put')



                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"  class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $board->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Content</label>

                                <div class="col-md-6">
                                    <textarea id="content" type="textare" class="form-control{{$errors->has('content') ? ' is-invalid' : ''}}" name="content"  required>{{ $board->content }}</textarea>

                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback">
                                        <strong>{{$errors->first('content')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Category As</label>

                                <div class="col-md-6">
                                    <select name="cat" class="form-control" id="role">
                                        @if($cats->count())
                                                <option value="{{$board->category_id}}">{{$board->category->name}}</option>
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
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
