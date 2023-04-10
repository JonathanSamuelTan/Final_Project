<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
  </head>
  <body style="background-color: #292336";>
    {{-- <nav class="navbar navbar-expand" style="background-color: #292336;">
      <div class="container">
          <div class="row d-flex justify-content-between">
              <div class="col-auto">
                  <a class="navbar-brand" href="#" style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 1.7rem;">
                      <img src="../assets/logo.png" alt="logo" width="75" height="75" class="d-inline-block align-text-middle">
                      Meksiko Retail Store
                  </a>
              </div>
  
              <div class="col ms-auto">
                  <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}" style="color: white;">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('cart')}}" style="color: white;">Cart</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('TransactionPage')}}" style="color: white;">Invoice Page</a>
                      </li>
                      <li class="nav-item">
                          <form action="{{route('logout')}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-danger">Log Out</button>
                          </form>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav> --}}

  <nav class="navbar navbar-expand-md" style="background-color: #292336;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS' sans-serif; font-size: 1.7rem;">
        <img src="../assets/logo.png" alt="logo" width="75" height="75" class="d-inline-block align-text-middle">
        Meksiko Retail Store
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          {{-- cart and invoice page if role = user --}}
          @if (Auth::user()->role == '0')
          <li class="nav-item">
            <a class="nav-link" href="{{route('cart')}}" style="color: white;">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('TransactionPage')}}" style="color: white;">Invoice Page</a>
          </li>
          @endif
          {{-- Admin Panel if role = admin --}}
          @if (Auth::user()->role == '1')
          <li class="nav-item">
            <a class="nav-link" href="{{route('AdminPanel')}}" style="color: white;">Admin Panel</a>
          </li>
          @endif
          <li class="nav-item">
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  
    
  
    
    
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>