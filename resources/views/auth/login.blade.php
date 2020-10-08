@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-center align-items-center">
    <div class="card shadow-sm" style="width: 23rem;">

      <div class="card-body">
        <h4 class="card-title text-center">{{ __('Login') }}</h4>
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
            <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <div class="form-group">
            <label for="password" class="col-form-label">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary btn-block">
            {{ __('Login') }}
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
