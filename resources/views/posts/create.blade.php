@extends('layouts.master')
@section('content')
@include('layouts.leftSidebar') 
<div class="container col-8 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Create a new post</div>

                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-4 col-form-label text-md-right  ml-1 row">Post title</label>

                            <div class="col-md-12 row">
                                <input  type="text" class="form-control @error('title') is-invalid @enderror ml-2" name="title" value="{{ old('title') }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body" class="col-md-4 col-form-label text-md-right ml-1 row">Post content</label>

                            <div class="col-md-12">
                              <textarea class="form-control @error('body') is-invalid @enderror"  name="body" rows="7" required>{{ old('body') }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <label class="col-md-4 col-form-label text-md-right row">Post Picture:</label>
                            <input type="file" id="file" class="row @error('image') is-invalid @enderror" name="image" value="{{ old('file') }}">
                              @error('image')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Create Post
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
