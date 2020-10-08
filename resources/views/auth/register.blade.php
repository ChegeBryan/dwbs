@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-center align-items-center">
    <div class="card" style="width: 23rem;">
      <div class="card-body">
        <h3 class="card-title text-center">{{ __('Register') }}</h3>
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="form-group">
            <label for="name" class="col-form-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="mobile" class="col-form-label">{{ __('Mobile') }}</label>

            <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                   value="{{ old('mobile') }}" required autocomplete="phone">

            @error('mobile')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password" class="col-form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                   autocomplete="new-password">
          </div>

          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_employer" value="1">
            <label class="custom-control-label" for="is_employer">Register as Employer</label>
          </div>

          <button type="submit" class="btn btn-primary btn-block mt-3">
            {{ __('Register') }}
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
