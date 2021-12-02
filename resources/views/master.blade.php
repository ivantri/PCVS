<!doctype html>
<html lang="id" class="mh-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jaqueour">
    <meta name="generator" content="Hugo 0.88.1">
    <title>PCVS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

    

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap-grid.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap-utilities.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap-reboot.min.css')}}" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{asset('/mycss/cover.css')}}" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">
  @if($errors->any())
    <script>alert('{!!implode('', $errors->all(':message'))!!}');</script>
  @endif
  @if(session('success'))
    <script>alert('{!!session('success')!!}')</script>
  @endif
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
            
            <h3 class="float-md-start mb-0">PCVS</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link" aria-current="page" href="/">Patient</a>
                <a class="nav-link" href="/admin">Admin</a>
                <a class="nav-link" href="/logout">Logout</a>
            </nav>
            </div>
        </header>
        @yield('content')
        <footer class="mt-auto text-white-50">
            <p>Vaccination management system <a style="text-decoration: none;" href="/" class="text-white">PCVS</a>, by <a style="text-decoration: none;" href="/" class="text-white">Us</a>.</p>
        </footer>
    </div>
</body>
</html>
