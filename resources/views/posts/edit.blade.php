@extends('layouts.master')
@section('content')
@include('layouts.leftSidebar') 
<div class="container col-8 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Post Editor</div>
                <div class="card-body">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row align-items-center">
                            
                            <div class="col-6">
                                <label class="col-4 col-form-label text-md-right row">Post Image:</label>
                                <input type="file" id="file" class="row @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                @if (!is_null($post->image))
                                <img src="{{ asset($post->image) }}" class="card-img-top">
                                @endif
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-md-4 col-form-label text-md-right  ml-1 row">Post title</label>
                        
                        <div class="col-md-12 row">
                            <input  type="text" class="form-control @error('title') is-invalid @enderror ml-2" name="title" value="{{ old('title', $post->title) }}" required autofocus>
                            
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
                                <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="7" required>{{ old('body', $post->body) }}</textarea>
                                
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group justify-content-center row my-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6" style="height: 90px"></div>
    <script>
        const tx = document.getElementsByTagName("textarea");
        for (let i = 0; i < tx.length; i++) {
            tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden; ");
            tx[i].addEventListener("input", OnInput, false);
        }
        
        function OnInput() {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        }
        </script>
<script src="{{ asset('/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script src="{{ asset('/tinymce/custom.js') }}" referrerpolicy="origin"></script>
@endsection
