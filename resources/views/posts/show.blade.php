@extends('layouts.master')
@section('content')
@include('layouts.leftSidebar') 
<div class="container mb-lg-5">
<div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Auther: <img src="{{ asset($post->user->image) }}" class="user-image-mini"> {{ $post->user->name }} <span class="ml-5">Created at: {{$post->created_at}}</span></li>

  </ul>
  <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Post title: {{ $post->title }}</h5>
    <p class="card-text">{{ $post->body }}</p>
  </div>
  <div class="card">
  <div class="card-header font-weight-bold">
    Add comment
  </div>
  <div class="card-body">
    <div class="form-group">
    <form action="{{ route('comments.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <textarea class="form-control" name="body" rows="3"></textarea>
      </div>
      <input type="hidden" name="post_id" value="{{ $post->id }}">
    <button type="submit" class="btn btn-primary">Add comment</button>
    </form>
    </div>
  </div>
</div>
  @foreach ($post->comments as $comment)
    <ul class="list-group list-group-flush">
    <li class="list-group-item"><img src="{{ asset($comment->user->image) }}" class="user-image-mini"> {{ $comment->user->name }} >> {{ $comment->body }}</li>
  </ul>
  @endforeach
</div>
</div>
@endsection
