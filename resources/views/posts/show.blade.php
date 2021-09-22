@extends('layouts.master')

@section('content')
<div class="container mb-lg-5">
<div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Auther: <img src="{{ asset($post->user->image) }}" class="user-image-mini"> {{ $post->user->name }} <span class="ml-5">Created at: {{$post->created_at}}</span></li>

  </ul>
  <img src="{{ asset($post->image) }}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Post title: {{ $post->title }}</h5>
    <p class="card-text">{{ $post->body }}</p>
  </div>
  @foreach ($post->comments as $comment)
    <ul class="list-group list-group-flush">
    <li class="list-group-item"><img src="{{ asset($comment->user->image) }}" class="user-image-mini"> {{ $comment->user->name }} >> {{ $comment->body }}</li>
  </ul>
  @endforeach
</div>
</div>
@endsection
