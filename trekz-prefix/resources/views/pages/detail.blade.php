@extends('layouts.app')

@section('title', 'TREKZ')

@section('content')
<header class="detail-header"></header>

<main>
  <div class="container">
    <div class="row">
      <div class="col-12 px-0">
        <nav>
          <ol class="breadcrumb p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Paket Travel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
          </ol>
        </nav>
      </div>
      <div class="col-12 col-lg-8 px-lg-0 mb-3 mb-lg-0">
        <div class="card card-destination">
          <h1 class="destination-title mb-1">{{ $travel->title }}</h1>
          <p class="destination-location">{{ $travel->location }}</p>
          <div class="gallery">
            <div class="xzoom-container">
              <img src="{{ Storage::url($travel->thumbnail) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($travel->thumbnail) }}" alt="Nusa Penida">
            </div>
            <div class="xzoom-thumbs">
              @foreach ($travel->galleries as $gallery)
                <a href="{{ Storage::url($gallery->image) }}">
                  <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image) }}" alt="Nusa Penida">
                </a>
              @endforeach
            </div>
          </div>
          <h2 class="about-destination-title">Tentang Wisata</h2>
          <p class="destination-description">
            {{ $travel->about }}
          </p>
          <div class="features row">
            <div class="features-item d-flex align-items-center col-sm-6 col-md-4">
              <img src="{{ url('frontend/images/ic_event.png') }}" alt="{{ $travel->featured_event }}">
              <div>
                <p class="features-title mb-0">Featured Event</p>
                <p class="features-event mb-0">{{ $travel->featured_event }}</p>
              </div>
            </div>
            <div class="features-item d-flex align-items-center col-sm-6 col-md-4 border-left pl-md-5">
              <img src="{{ url('frontend/images/ic_language.png') }}" alt="{{ $travel->language }}">
              <div>
                <p class="features-title mb-0">Language</p>
                <p class="features-event mb-0">{{ $travel->language }}</p>
              </div>
            </div>
            <div class="features-item d-flex align-items-center col-sm-6 col-md-4 border-left pl-md-5">
              <img src="{{ url('frontend/images/ic_foods.png') }}" alt="{{ $travel->foods }}">
              <div>
                <p class="features-title mb-0">Foods</p>
                <p class="features-event mb-0">{{ $travel->foods }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card card-members">
          <h2 class="card-members-title">Members are going</h2>
          <div class="row members">
            <div class="col-1 col-lg-2">
              <img src="/frontend/images/anggaphoto.jpg" alt="Angga Rizky">
            </div>
            <div class="col-1 col-lg-2">
              <img src="/frontend/images/anggaphoto.jpg" alt="Angga Rizky">
            </div>
            <div class="col-1 col-lg-2">
              <img src="/frontend/images/anggaphoto.jpg" alt="Angga Rizky">
            </div>
            <div class="col-1 col-lg-2">
              <img src="/frontend/images/anggaphoto.jpg" alt="Angga Rizky">
            </div>
            <div class="col-1 col-lg-2">
              <div class="other-members d-flex justify-content-center align-items-center">
                <p>9+</p>
              </div>
            </div>
          </div>
          <hr>
          <h2 class="members-information-title">Trip Informations</h2>
          <table>
            <tr>
              <td>Date of Departure</td>
              <td align="right">{{ $travel->departure_date }}</td>
            </tr>
            <tr>
              <td>Duration</td>
              <td align="right">{{ $travel->duration }}</td>
            </tr>
            <tr>
              <td>Type</td>
              <td align="right">{{ $travel->type }}</td>
            </tr>
            <tr>
              <td>Price</td>
              <td align="right">$ {{ $travel->price }},00 / person</td>
            </tr>
          </table>
          @auth
            <form action="{{ route('checkout-process', $travel->id) }}" class="form-join" method="POST">
              @csrf
              <button type="submit" class="btn btn-block btn-join">
                Join Now
              </button>
            </form>
          @endauth
          @guest
            <a href="{{ route('checkout-process', $travel->id) }}" class="btn btn-join">Login or Register to Join</a>
          @endguest
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@push('append-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.min.css') }}">
<link rel="stylesheet" href="{{ url('frontend/styles/detail.css') }}">
@endpush

@push('append-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 500,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
</script>
@endpush