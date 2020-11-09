@extends('employer.base')

@section('col-9')
<form method="POST" action="{{route('account.update', Auth::user()->id)}}">
  @method('PATCH')
  @csrf

  <!-- Contact information -->
  <div class=" card">
    <div class="card-header bg-gradient-primary text-white">Update Contact information</div>
    <div class="card-body">
      <div class="form-group">
        <label for="name" class="col-form-label">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ $user->name }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
        <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
               value="{{ $user->email }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group">
        <label for="mobile" class="col-form-label">{{ __('Mobile') }}</label>

        <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
               value="{{ $user->mobile }}" required autocomplete="phone">

        @error('mobile')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
  </div>
  <!--End contact information-->


  <button type="submit" class="btn btn-primary btn-block mt-3">
    {{ __('Update') }}
  </button>
</form>
@endsection
