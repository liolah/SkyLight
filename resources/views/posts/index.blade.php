@extends('layouts.master')

@section('content')

@include('layouts.leftSidebar') 

<div class="container col-8 my-2">
  <div class="row justify-content-center">
      <div class="col-6">
          <div class="card">
              <div class="card-header text-center">Latest posts</div>
          </div>
      </div>
  </div>
  @foreach ($posts as $post)
  <div class="card my-2">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ $post->image }}" class="img-fluid rounded-start float-start ">
      </div>
      <div class="col-lg-8">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->body }}</p>
          <p class="card-text"><small class="text-muted">Created at: {{ $post->created_at }}</small></p>
          <a href="{{ url('/posts/'.$post->id) }}" class="btn btn-primary">View full post with comments</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="row justify-content-center my-3">
      <div class="col-6 offset-3 mb-4">
              <div class="card-header text-center"> {!! $posts->links() !!} </div>
      </div>
</div>
</div>
<script src="{{ asset('js/particles.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
@endsection
