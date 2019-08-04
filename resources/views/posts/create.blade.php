
@extends('layouts.app')

@section('title')
  CMS BLOG - Post | {{ isset($post) ? 'Edit' : 'Create' }}
@endsection


@section('content')
  <div class="card card-default">
    <div class="card-header">
      {{ isset($post) ? 'Edit Post' : 'Create Post' }}
    </div>

    @include('partials.error')

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
            <img src="{{ asset('posts/'. $post->image) }}" style="width: 100%" alt="{{ $post->image }}">
          </div>
        @endif

        <div class="form-group">
          <label for="category_id">Category</label>
          <select class="form-control form-control-sm" id="category_id" name="category_id">
            @foreach ($categories as $category)
              <option
                @if (isset($post))
                  @if ($category->id == $post->category_id)
                    selected
                  @endif
                @endif
               value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        @if ($tags->count() > 0)
          <div class="form-group">
            <label for="tags">Tags</label>

              <select class="form-control dynamic-selector" id="tags" name="tags[]" multiple>
                @foreach ($tags as $tag)
                  <option
                    @if (isset($post))
                      @if ($post->hasTag($tag->id)))
                        selected
                      @endif
                    @endif
                   value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
              </select>
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />

@endsection

@section('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

  <script type="text/javascript">
    flatpickr('#published_at', {
      enableTime: true
    })

    // set you selectbox class for awesome selectbox
    $(document).ready(function() {
        $('.dynamic-selector').select2();
    });

  </script>
@endsection
