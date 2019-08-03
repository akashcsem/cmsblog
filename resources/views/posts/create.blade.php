
@extends('layouts.app')

@section('content')
  <div class="card card-default">
    <div class="card-header">
      {{ isset($post) ? 'Edit Post' : 'Create Post' }}
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <div class="card-body">
      <form action="{{ isset($post) ? route('myposts.update', $post->id) : route('myposts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (isset($post))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control form-control-sm" value="{{ isset($post) ? $post->title : '' }}">
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" class="form-control form-control-sm" rows="5" cols="5">
          {{ isset($post) ? $post->description : '' }}
        </textarea>
        </div>

        <div class="form-group">
          <label for="content">Content</label>
          <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
          <trix-editor input="content"></trix-editor>
        </div>

        <div class="form-group">
          <label for="published_at">Publish At</label>
          <input type="text" name="published_at" class="form-control form-control-sm" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control form-control-sm" id="image">
        </div>

        @if (isset($post))
          <div class="form-group mt-1">
            <img src="{{ asset('posts/'. $post->image) }}" alt="{{ $post->image }}">
          </div>
        @endif


        <div class="form-group">
          <button type="submit" class="btn btn-success btn-sm" name="submit"> {{ isset($post) ? 'Update Post' : 'Create Post' }}
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection



@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script type="text/javascript">
    flatpickr('#published_at', {
      enableTime: true
    })


  </script>
@endsection
