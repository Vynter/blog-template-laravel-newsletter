<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title','Travel Blog - Travel Better Cheaper Longer')</title>

  <!-- Bootstrap core CSS -->


  <!-- Custom fonts for this template -->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Roboto&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->

  <link href="{{mix('/css/app.css')}}" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand tv" href="{{ route('index')}}">Travel Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()==="index"? "active" : "" }}" href="{{route('index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()==="about"? "active": "" }}" href="{{route('about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()==="sample"? "active": "" }}" href="{{route('sample')}}">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()==="contact"? "active": "" }}" href="{{route('contact')}}">Contact</a>
          </li>
        @if (auth()->check())
        <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName()==="articles.create"? "active": "" }}" href="{{route('articles.create')}}">Crée un article</a>
          </li>
            <li class="nav-item">
                <a class="nav-link {{Route::currentRouteName()==="logout"? "active": "" }}" href="{{route('logout')}}">logout</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{Route::currentRouteName()==="login"? "active": "" }}" href="{{route('login')}}">login</a>
            </li>
        @endif

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url(@yield("bg-image","/img/about-bg.jpg"))">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1 class="tv"> @yield('title','Travel Blog')</h1>
            <span class="subheading"> @yield('sub_title','Travel Better Cheaper Longer')</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
 @yield('content')

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
        <div class="row d-flex align-content-center justify-content-center mb-4">
            <form class="form-inline" action="{{route('newsletter.store')}}" method="POST">
                @csrf
            <input type="email" name="mail" class="form-control" placeholder="Votre Email...">
            <button class="btn btn-info" >Newsletter</button>
            </form>





        </div>

      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/js/clean-blog.min.js"></script>

</body>

</html>
