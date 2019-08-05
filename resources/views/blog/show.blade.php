

@extends('layouts.blog')


@section('title')
  Blog - {{ $post->title }}
@endsection


@section('content')
<div  style="background: white">

  <div class="row my-0 py-0 banner" style="margin-top: -5px">
    <img style="opacity: 0.7" src="{{ asset('posts/'. $post->image) }}" width="100%" height="400px" alt="">
    <div class="centered">
      <h1 style="color: white">{{ $post->description }}</h1>
      <h4 >{{ $post->user->name }}</h4>
      <p><img style="border-radius: 50%" height="60px" width="60px" src="{{ Gravatar::src(asset($post->image))}}" alt=""> </p>
    </div>
  </div>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d486dde6d10b3a4"></script>


  <div class="content container">
    <div class="title mt-5">
      <h3 class="font-weight-bold text-primary">{{ $post->title }}</h3>
    </div>
    {!! $post->content !!}



    <div class="tags my-5">
      <strong class="h4">Tags </strong>
      @foreach ($post->tags as $tag)
        <span style="letter-spacing: 1.5px" class="badge badge-pill badge-secondary mr-2 px-2 py-1"><a style="text-decoration: none; color: white" href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a> </span>
      @endforeach
    </div>






    <hr>
    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
    this.page.url = "{{ config('app.url') }}/blog/posts/{{ $post->id }}";  // Replace PAGE_URL (full dynamic url) with your page's canonical URL variable
    this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER (post id) with your page's unique identifier variable
    };



    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://cms-blog-6.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    {{-- <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> --}}



  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d486dde6d10b3a4"></script>
@endsection
