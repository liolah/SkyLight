@extends('layouts.master')

@section('content')
@include('layouts.leftSidebar') 
<div class="container mb-lg-5">
<div class="card offset-2">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">By <a href="{{ route('users.show', $post->user) }}"><img src="{{ asset($post->user->image) }}" class="user-image-mini mr-2">{{ $post->user->name }} </a> 
      <span class="ml-4 text-small text-muted">{{ $post->created_at->diffForHumans() }}</span>
    <a href="{{ route('posts.edit', $post) }}" class="btn text-success btn-link offset-3 form-inline" style="margin-left: 450px">Edit</a>
        <form class="d-inline" action="{{ route('posts.destroy', $post ) }}" method="POST">
          @csrf
          @method('delete')
        <button type="submit" class="btn text-danger btn-link form-inline">Delete</button>
        </form>
        </li>
  </ul>
  @if (!is_null($post->image))
  <img src="{{ asset($post->image) }}" class="card-img-top">
  @endif
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{!! $post->body !!}</p>
  </div>
  <div class="card">
  <div class="card-header font-weight-bold">
    Add comment
  </div>
  <div class="card-body">
    <div class="form-group">
    <form action="{{ url('posts/' . $post->id . '/comments') }}" method="POST">
      @csrf
      <div class="form-group">
        <textarea class="form-control" name="body" rows="3"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">Add comment</button>
    </form>
    </div>
  </div>
</div>
  @foreach ($post->comments as $comment)
  <div class="card">
      <div class="card-body">
      <h5 class="card-title"><a href="{{ route('users.show', $comment->user) }}"><img src="{{ asset($comment->user->image) }}" class="user-image-mini mr-2">{{ $comment->user->name }} </a> </h5>
      <h6 class="card-subtitle mb-3 text-muted ml-5">{{ $comment->created_at->diffForHumans(null,true,false) }}</h6>
      @cannot('update', $comment)
      <p class="card-text ml-5"> {{ $comment->body }}</p>
      @endcannot
      @can('update', $comment)
      <form class="d-inline" action="{{ route('comments.update', $comment ) }}" method="POST">
          @csrf
          @method('patch')
        <textarea name="body" rows="2" class="col-11 card-text ml-4 comment-textarea" id="{{ $comment->id }}" readonly style="outline: none">{{ $comment->body }}</textarea>
        {{-- Edit and save buttons --}}
        <a onclick="document.getElementById('{{ $comment->id }}').removeAttribute('readonly'); 
          document.getElementById('{{ $comment->id }}').setAttribute('class', 'col-11 form-control card-text ml-4'); 
          this.setAttribute('hidden', true);
          document.getElementById('save{{ $comment->id }}').removeAttribute('hidden');"
          href="#{{ $comment->id }}" class="btn text-info btn-link form-inline">Edit</a>
        <button type="submit" class="btn text-success btn-link form-inline" id="save{{ $comment->id }}" hidden>Save</button>
      </form>
      @endcan
      @can('delete', $comment)
        <form class="d-inline" action="{{ route('comments.destroy', $comment ) }}" method="POST">
          @csrf
          @method('delete')
        <button type="submit" class="btn text-danger btn-link form-inline">Delete</button>
        </form>
      @endcan
      </div>
    </div>
  @endforeach
</div>
</div>
<div class="mb-4" style="height: 20px"></div>
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
@endsection
