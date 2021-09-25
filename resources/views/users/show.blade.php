@extends('layouts.master')

@section('content')

@include('layouts.leftSidebar') 
<div class="container col-6 mb-lg-5">
  <div class="card offset-2" style="width: 36rem;">
  <img src="{{ asset($user->image) }}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">User Name: {{ $user->name }}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Email: {{ $user->email }}</li>
    <li class="list-group-item">Gender: {{ $user->gender }}</li>
    <li class="list-group-item">Address: {{ $user->address }}</li>
    <li class="list-group-item">Bio: {{ $user->about }}</li>
  </ul>
  <div class="card-body">
    <div class="row justify-content-between">
      <div class="col-6">
    <a href="{{ route('users.edit', $user) }}" class="btn btn-info">Edit User Info</a>
    </div>
    <div class="col-6">
    <form action="{{ route('users.destroy', $user ) }}" method="POST">
      @csrf
      @method('delete')
    <button type="submit" class="btn btn-danger">Delete account</button>
    </form>
    </div>
  </div>
</div>
</div>
<div class="" style="height: 50px"></div>
</div>
@endsection
