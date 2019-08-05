

@extends('layouts.blog')

@section('title')
  Blog - {{ $tag->name }}
@endsection


@section('content')

  <div class="row my-0 py-0 banner" style="margin-top: -5px">
    <img src="{{ asset('img/banner.jpg') }}" width="100%" height="250px" alt="">
    <div class="centered">

      <h1>{{ $tag->name }}</h1>
      {{-- <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, voluptates!</h3> --}}
    </div>
  </div>

<div class="container">
  <div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">



    <div class="row">
      <h1 class="my-4 col-12 text-center" style="color: #3EBCEE"> All {{ $tag->name }} Post</h1>


      <!-- Blog Post -->
      @forelse ($posts as $post)
        <div class="col-md-6">
          <div class="card mb-4 mx-3">

            <a href="{{ route('blog.show', $post->id) }}">
              <img class="card-img-top" height="180px" src="{{ asset('posts/' . $post->image) }}" alt="Card image cap">
            </a>


            <div class="card-body">
              <h4 class="card-title font-weight-normal">{{ $post->title }}</h4>
              <div class="text-muted mb-3 author" style="margin-top: -15px;">
                Posted on {{ date('d-M-Y', strtotime($post->published_at)) }}
                <strong style="color: black">by, {{ $post->user->name }}</strong>
              </div>
              <p class="text-left">{{ $post->description }}<a class="btn btn-primary btn-sm" href="{{ route('blog.show', $post->id) }}">Read More...</a></p>
            </div>
          </div>

        </div>
      @empty
        <div class="my3 py-5 text-center">
          <h3>No results found for query <strong>{{ request()->query('search') }}</strong> </h3>
        </div>
      @endforelse
      <!-- End Blog Post -->


    </div>

    <!-- Pagination -->
    {{ $posts->appends(['search' => request()->query('search')])->links() }}

  </div>


    @include('partials.sidebar')


  </div>

</div>
@endsection
