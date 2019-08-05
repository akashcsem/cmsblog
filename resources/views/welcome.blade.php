

@extends('layouts.blog')

@section('title')
  Blog - Home
@endsection


@section('content')

  <div class="row my-0 py-0 banner" style="margin-top: -5px">
    <img src="{{ asset('img/banner.jpg') }}" width="100%" height="250px" alt="">
    <div class="centered">

      <h1>Todays Blog</h1>
      <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, voluptates!</h3>
    </div>
  </div>

<div class="container">
  <div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">



    <div class="row">
      <h1 class="my-4 col-12 text-center" style="color: #3EBCEE"> Latest Posts </h1>


      <!-- Blog Post -->
      @foreach ($posts as $post)
        <div class="col-md-6">
          <div class="card mb-4 mx-3">

            <a href="{{ route('blog.show', $post->id) }}">
              <img class="card-img-top" height="180px" src="{{ asset('posts/' . $post->image) }}" alt="Card image cap">
            </a>


            <div class="card-body">
              <h4 class="card-title font-weight-normal">{{ $post->title }}</h4>
              <div class="text-muted mb-3 author" style="margin-top: -15px;">
                Posted on {{ date('d-M-Y', strtotime($post->published_at))}}
                <strong style="color: black">by, {{ $post->user->name }}</strong>
              </div>
              <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<a class="btn btn-primary btn-sm ml-3" href="{{ route('blog.show', $post->id) }}">Read More...</a></p>
            </div>
          </div>

        </div>

      @endforeach
      <!-- End Blog Post -->


    </div>

    <!-- Pagination -->
    <ul class="pagination mb-4">
      <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
      </li>
      <li class="page-item ml-auto">
        <a class="page-link" href="#">Newer &rarr;</a>
      </li>
    </ul>

  </div>





  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">Search</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Categories</h5>
      <div class="card-body">
        <div class="row">
          @foreach ($categories as $category)
            <div class="width-50"><a class="text-muted" href="#">{{ $category->name }}</a></div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Tags Widget -->
    <div class="card my-4">
      <h5 class="card-header">Tags</h5>
      <div class="card-body">
        <div class="row">
          @foreach ($tags as $tag)
            <div class="width-33"><a class="text-muted" href="#">{{ $tag->name }}</a></div>
          @endforeach
        </div>
      </div>
    </div>


  </div>
  <!-- End Sidebar Widgets Column -->

  </div>

</div>
@endsection
