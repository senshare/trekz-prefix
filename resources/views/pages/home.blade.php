@extends('layouts.app')

@section('title', 'NOMADS')

@section('content')
<!-- Header -->
<header class="text-center">
  <h1 class="title mb-3">
    Explore The Beautiful World
    <br>
    As Easy One Click
  </h1>
  <p class="sub-title">
    You will see beautiful
    <br>
    moment you never see before
  </p>
  <a href="#popular" class="btn btn-get-started px-4 mt-4">
    Get Started
  </a>
</header>

<main>
  <div class="container">
    <!-- Statistics -->
    <section class="row justify-content-center section-stats">
      <div class="col-6 col-md-2 stats-detail">
        <h2 class="mb-0">20K</h2>
        <p class="mb-0">Members</p>
      </div>
      <div class="col-6 col-md-2 stats-detail">
        <h2 class="mb-0">12</h2>
        <p class="mb-0">Countries</p>
      </div>
      <div class="col-6 col-md-2 stats-detail">
        <h2 class="mb-0">3K</h2>
        <p class="mb-0">Hotels</p>
      </div>
      <div class="col-6 col-md-2 stats-detail">
        <h2 class="mb-0">72</h2>
        <p class="mb-0">Partners</p>
      </div>
    </section>
  </div>

  <!-- Popular Destination -->
  <section class="section-popular" id="popular">
    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-12 text-center">
          <h2 class="mb-3">Wisata Popular</h2>
          <p>
            Something that you never try
            <br>
            before in this world
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-popular-content">
    <div class="container">
      <div class="row justify-content-center">
        @foreach ($travels as $travel)
          <div class="col-sm-6 col-md-4 col-lg-3 mb-2 mb-lg-0">
            <div
              class="card-travel text-center d-flex flex-column"
              style="background-image: url('{{ Storage::url($travel->thumbnail) }}');"
            >
              <h2 class="travel-country">{{ $travel->location }}</h2>
              <h3 class="travel-location">{{ $travel->title }}</h3>
              <div class="mt-auto">
                <a href="{{ route('detail', $travel->slug) }}" class="btn px-4 text-white btn-travel-details">View Details</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="section-networks">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-12 col-lg-3 text-center text-lg-left mb-3 mb-lg-0">
          <h2>Our Networks</h2>
          <p>Companies are trusted us more than just a trip</p>
        </div>
        <div class="col-12 col-md-6 col-lg-2 text-center mb-5 mb-lg-0">
          <img src="frontend/images/ana.png" alt="Partner">
        </div>
        <div class="col-12 col-md-6 col-lg-2 text-center mb-5 mb-lg-0">
          <img src="frontend/images/disney.png" alt="Disney">
        </div>
        <div class="col-12 col-md-6 col-lg-2 text-center mb-5 mb-lg-0">
          <img src="frontend/images/shangri-la.png" alt="Shangri La">
        </div>
        <div class="col-12 col-md-6 col-lg-2 text-center mb-5 mb-lg-0">
          <img src="frontend/images/visa.png" alt="Visa">
        </div>
      </div>
    </div>
  </section>

  <section class="section-testimonials">
    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-12 text-center">
          <h2 class="mb-3">They Are Loving Us</h2>
          <p>
            Moments were giving them
            <br>
            the best experience
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-testimonials-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 mb-2 mb-lg-0">
          <div class="card-testimonial text-center d-flex flex-column align-items-center mx-auto">
            <img class="testimonial-photo" src="frontend/images/anggaphoto.jpg" alt="Angga Rizky">
            <p class="testimonial-name">Angga Risky</p>
            <p class="testimonial-quote">“ It was glorious and I could not stop to say wohooo for every single moment Dankeeeeee “</p>
          </div>
          <div class="testimonial-footer text-center py-3 mx-auto">
            <p>Trip to Ubud</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 mb-lg-0">
          <div class="card-testimonial text-center d-flex flex-column align-items-center mx-auto">
            <img class="testimonial-photo" src="frontend/images/Image 6.jpg" alt="Angga Rizky">
            <p class="testimonial-name">Shayna</p>
            <p class="testimonial-quote">“ The trip was amazing and
              I saw something beautiful in
              that Island that makes me
              want to learn more “</p>
          </div>
          <div class="testimonial-footer text-center py-3 mx-auto">
            <p>Trip to Nusa Penida</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-2 mb-lg-0">
          <div class="card-testimonial text-center d-flex flex-column align-items-center mx-auto">
            <img class="testimonial-photo" src="frontend/images/Image 7.jpg" alt="Angga Rizky">
            <p class="testimonial-name">Shabrina</p>
            <p class="testimonial-quote">“ I loved it when the waves
              was shaking harder — I was
              scared too “</p>
          </div>
          <div class="testimonial-footer text-center py-3 mx-auto">
            <p>Trip to Karimun Jawa</p>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-5">
          <a href="#" class="btn btn-help mr-3">I Need Help</a>
          <a href="{{ route('register') }}" class="btn btn-get-started">Get Started</a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('append-style')
<link rel="stylesheet" href="{{ url('frontend/styles/main.css') }}">
@endpush