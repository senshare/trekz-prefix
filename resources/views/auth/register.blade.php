@extends('layouts.auth')

@section('content')
<section class="section-background container-fluid">
	<div class="row">
		<div class="col-12 col-lg-8 white-background"></div>
		<div class="col gray-background d-none d-lg-block"></div>
	</div>
</section>

<main>
	<section class="section-main container">
		<div class="row align-items-center justify-content-between">
			<div class="col col-lg-6 d-none d-lg-block left-side">
				<h1 class="mb-3">We explore the new life much better</h1>
				<div class="row mini-gallery">
					<div class="col-6">
						<div class="row flex-column">
							<div class="col">
								<img src="https://images.unsplash.com/photo-1500835556837-99ac94a94552?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dHJhdmVsfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" class="long-image" alt="">
							</div>
							<div class="col">
								<img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1035&q=80" class="short-image">
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="row flex-column">
							<div class="col">
								<img src="https://images.unsplash.com/photo-1488085061387-422e29b40080?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fHRyYXZlbHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" class="short-image" alt="">
							</div>
							<div class="col">
								<img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHRyYXZlbHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" class="long-image" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-5 right-side">
				<div class="card card-login mx-auto m-lg-0">
					<div class="card-header bg-white border-0 text-center">
                        <a href="{{ route('home') }}">
							<img src="{{ url('frontend/images/logo_nomads.jpg') }}" alt="NMADS">
						</a>
					</div>
					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="form-group">
								<label for="name">{{ __('Name') }}</label>
								<input
									type="name"
									class="form-control @error('name') is-invalid @enderror"
                                    name="name"
									id="name"
									value="{{ old('name') }}"
									autocomplete="name"
									required
									autofocus
								/>
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
                            
							<div class="form-group">
								<label for="username">{{ __('Username') }}</label>
								<input
									type="username"
									class="form-control @error('username') is-invalid @enderror"
                                    name="username"
									id="username"
									value="{{ old('username') }}"
									autocomplete="username"
									required
									autofocus
								/>
								@error('username')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="email">{{ __('E-Mail Address') }}</label>
								<input
									type="email"
									class="form-control @error('email') is-invalid @enderror"
                                    name="email"
									id="email"
									value="{{ old('email') }}"
									autocomplete="email"
									required
									autofocus
								/>
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
			
							<div class="form-group">
								<label for="password">{{ __('Password') }}</label>
								<input
									type="password"
									class="form-control @error('password') is-invalid @enderror"
                                    name="password"
									id="password"
									autocomplete="password"
									required
									autofocus
								/>
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="password_confirmation">{{ __('Confirm Password') }}</label>
								<input
									type="password"
									class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation"
									id="password_confirmation"
									autocomplete="password_confirmation"
									required
									autofocus
								/>
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">
									{{ __('Sign Up') }}
								</button>
							</div>

                            <div class="form-group text-center mb-0">
                                <a class="text-secondary" href="{{ route('login') }}">
                                        {{ __('Already have an account? Sign in now') }}
                                </a>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection

@push('append-style')
	<link rel="stylesheet" href="{{ url('frontend/styles/login.css') }}">
@endpush