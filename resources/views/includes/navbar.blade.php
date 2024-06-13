<!-- Navbar -->
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white py-lg-0">
    <a href="{{ route('home') }}" class="navbar-brand">
      <img src="{{ url('frontend/images/logo_nomads.jpg') }}" alt="NMADS">
    </a>
    <button
      class="navbar-toggler navbar-toggler-right"
      type="button"
      data-toggle="collapse"
      data-target="#navb"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item mx-md-3"><a href="#" class="nav-link active">Home</a></li>
        <li class="nav-item mx-md-3"><a href="#" class="nav-link">Paket Travel</a></li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
            Services
          </a>
          <div class="dropdown-menu" id="dropdown">
            <a href="#" class="dropdown-item">Link 1</a>
            <a href="#" class="dropdown-item">Link 2</a>
            <a href="#" class="dropdown-item">Link 3</a>
          </div>
        </li>
        <li class="nav-item mx-md-3"><a href="#" class="nav-link">Testimonial</a></li>
      </ul>

      @guest
      <!-- Mobile Button -->
      <form class="form-inline d-sm-block d-md-none">
        <button
          type="button"
          class="btn btn-login my-2 my-sm-0 px-4"
          onclick="event.preventDefault(); location.href = '{{ route('login') }}';"
        >
          Sign In
        </button>
      </form>

      <!-- Desktop Button -->
      <form class="form-inline d-none d-md-block">
        <button
          type="button"
          class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
          onclick="event.preventDefault(); location.href = '{{ route('login') }}';"
        >
          Sign In
        </button>
      </form>
      @endguest

      @auth
      <!-- Mobile Button -->
      <form action="{{ route('logout') }}" method="POST" class="form-inline d-sm-block d-md-none">
        @csrf
        <button
          type="submit"
          class="btn btn-login my-2 my-sm-0 px-4"
        >
          Sign Out
        </button>
      </form>

      <!-- Desktop Button -->
      <form action="{{ route('logout') }}" method="POST" class="form-inline d-none d-md-block">
        @csrf
        <button
          type="submit"
          class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"
        >
          Sign Out
        </button>
      </form>
      @endauth
    </div>
  </nav>
</div>