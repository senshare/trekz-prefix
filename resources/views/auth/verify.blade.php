@extends('layouts.auth')

@section('title', 'Verify your account')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-4">
            <img src="{{ url('frontend/images/ic_mail.png') }}">
        </div>
        <div class="col-md-8">
            <h2>{{ __('Verify Your Email Address') }}</h2>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection

@push('append-style')
    <style>
        body {
            font-family: 'Assistant', sans-serif;
            color: #071C4D;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
@endpush