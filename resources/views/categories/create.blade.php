
@extends('layouts.app')

@section('title')
  CMS BLOG - Category | {{ isset($category) ? 'Edit' : 'Create' }}
@endsection


@section('content')

  <div class="card card-default">
    <div class="card-header">
      {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </div>

    <div class="card-body">

      @include('partials.error')

      <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store')  }}" method="post">
        @csrf
        @if (isset($category))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ isset($category) ? $category->name : '' }}">
        </div>
        <div class="form-group">
          <button class="btn btn-success" type="submit" name="submit">{{ isset($category) ? 'Update Category' : 'Create Category' }}</button>
        </div>
      </form>
    </div>
  </div>
@endsection
