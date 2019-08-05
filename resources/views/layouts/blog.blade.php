<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">

  <style media="screen">
      .width-50 {
        width: 50%;
        padding-left: 10px;
      }
      .width-33 {
        width: 33%;
        padding-left: 10px;
      }

      a {
        text-decoration: none;
      }
      a:hover {
        color: #61AFEF !important;
        text-decoration: none;
      }

      /* Container(banner) holding the image and the text */
      .banner {
        position: relative;
        text-align: center;
        color: white;
      }


    /* Centered text */
    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .author {
      font-size: 12px;
    }

  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top my-0">
    <div class="container">
      <a class="navbar-brand" href="#">CMS BLOG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('welcome') }}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  @yield('content')


  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Todays Bloger 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('scripts')
  {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}

</body>

</html>
