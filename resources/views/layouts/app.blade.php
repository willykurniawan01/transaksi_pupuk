<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    @stack('style')

</head>
<body>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto">
            <a class="nav-link active" href="{{ route("home") }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="{{ route("pupuk.index") }}">Pupuk</a>
            <a class="nav-link" href="{{ route("transaksi.index") }}">Transaksi</a>
          </div>
        </div>
      </nav>
    @yield('content')
    <script src="{{ asset("js/app.js") }}"></script>
    @stack('script')
    @include('sweetalert::alert')
</body>
</html>