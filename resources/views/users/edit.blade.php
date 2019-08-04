


@extends('layouts.app')

@section('title')
  CMS BLOG - User | Edit
@endsection

@section('content')
  <div class="card">
      <div class="card-header">Profile</div>

      @include('partials.error')
      
      <div class="card-body">

          <form action="{{ route('users.update-porfile') }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="form-group">
              <label for="about">About</label>
              <textarea name="about" rows="5" cols="5" class="form-control">{{ $user->about }}</textarea>
            </div>

            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-success btn-sm">Update Profile</button>
            </div>
          </form>
      </div>
  </div>
@endsection
