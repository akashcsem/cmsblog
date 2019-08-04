
@extends('layouts.app')

@section('title')
  CMS BLOG - Tag | {{ isset($tag) ? 'Edit' : 'Create' }}
@endsection

@section('content')

  <div class="card card-default">
    <div class="card-header">
      {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
    </div>

    <div class="card-body">

      @include('partials.error')

      <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store')  }}" method="post">
        @csrf
        @if (isset($tag))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ isset($tag) ? $tag->name : '' }}">
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit" name="submit">{{ isset($tag) ? 'Update Tag' : 'Create Tag' }}</button>
        </div>
      </form>
    </div>
  </div>
@endsection
