@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
    <a href="{{ route('travel-package.index') }}" class="btn btn-secondary btn-sm shadow-sm">
      <i class="fas fa-arrow-left fa-sm text-white-50"></i>
      Kembali
    </a>
  </div>

  @include('includes.alert')

  <div class="card">
    <div class="card-body">
      <form action="{{ route('travel-package.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" value="{{ old('title') }}">
          @error('title')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="location">Location</label>
          <input type="text" class="form-control" name="location" value="{{ old('location') }}">
          @error('location')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="about">About</label>
          <textarea class="form-control d-block w-100" rows="10" name="about">{{ old('about') }}</textarea>
          @error('about')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="featured_event">Featured Event</label>
          <input type="text" class="form-control" name="featured_event" value="{{ old('featured_event') }}">
          @error('featured_event')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="language">Language</label>
          <input type="text" class="form-control" name="language" value="{{ old('language') }}">
          @error('language')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="foods">Foods</label>
          <input type="text" class="form-control" name="foods" value="{{ old('foods') }}">
          @error('foods')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="departure_date">Departure Date</label>
          <input type="date" class="form-control" name="departure_date" value="{{ old('departure_date') }}">
          @error('departure_date')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="duration">Duration</label>
          <input type="text" class="form-control" name="duration" value="{{ old('duration') }}">
          @error('duration')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="type">Type</label>
          <input type="text" class="form-control" name="type" value="{{ old('type') }}">
          @error('type')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" name="price" value="{{ old('price') }}">
          @error('price')
            <p class="text-danger small mt-1">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection