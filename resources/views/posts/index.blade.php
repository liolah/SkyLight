@extends('layouts.master')

@section('content')

@include('layouts.leftSidebar') 

<div class="container col-8 my-2 mb-5">
  <div class="row justify-content-center">
      <div class="col-6">
          <div class="card">
              <div class="card-header text-center">Latest posts</div>
          </div>
      </div>
  </div>
  @foreach ($posts as $post)
  <div class="card offset-1 my-2">
    <div class="row">
      @if (!is_null($post->image))
      <div class="col-md-4">
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-start float-start ">
      </div>
      @endif
      <div class="col-lg-8">
        <div class="card-body">
          <p class="card-text">Auther: <img src="{{ asset($post->user->image) }}" class="user-image-mini"> {{ $post->user->name }} <span class="ml-5">Created at: {{$post->created_at}}</span></p>
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->body }}</p>
          <p class="card-text"><small class="text-muted">Created at: {{ $post->created_at }}</small></p>
          <a href="{{ url('/posts/'.$post->id) }}" class="btn btn-primary">View full post with comments</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @if ($posts->hasPages())
  <div class="row justify-content-center my-3">
      <div class="col-6 offset-3 mb-4">
              <div class="card-header text-center"> {!! $posts->links() !!} </div>
      </div>
  </div>
  @endif
</div>
<script src="{{ asset('js/particles.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
@endsection
