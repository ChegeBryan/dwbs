@extends('candidate.base')

@section('col-9')
<form method="POST" action="{{route('candidate.store')}}">
  @csrf

  <!-- Job job-->
  <div class=" card">
    <div class="card-header bg-danger text-white">Set Job Prefences</div>
    <div class="card-body">
      <div class="form-group">
        <label for="category" class="col-form-label">{{ __('Job Category') }}</label>
        <select class="custom-select  @error('category') is-invalid @enderror" name="category" id="category" required>
          <option selected value="House Help">House Help</option>
          <option value="Shamba Boy">Shamba Boy</option>
        </select>

        @error('category')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-row">
        <div class="col">
          <label for="job_type" class="col-form-label">{{ __('Job Type') }}</label>
          <select class="custom-select" name="job_type" id="job_type" required>
            <option selected value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
          </select>
          @error('job_type')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col">
          <label for="salary" class="col-form-label">{{ __('Salary (Ksh.)') }}</label>
          <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary"
                 value="{{ old('salary') }}" placeholder="10000" required>
          @error('salary')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>
  </div>
  <!--End about job-->


  <!--Address and Location-->
  <div class="card my-4">
    <div class="card-header bg-danger text-white">Job location Preferences</div>
    <div class="card-body">
      <div class="form-row">
        <div class="col">
          <label for="county" class="col-form-label">{{ __('County') }}</label>
          <input id="county" type="text" class="form-control @error('county') is-invalid @enderror"
                 placeholder="Nairobi" name="county" value="{{ old('county') }}" required>
          @error('county')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col">
          <label for="town" class="col-form-label">{{ __('Town / City') }}</label>
          <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" placeholder="Kasarani"
                 name="town" value="{{ old('town') }}" required>
          @error('county')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>
  </div>
  <!--End Address and Location-->

  <button type="submit" class="btn btn-danger btn-block mt-3">
    {{ __('Post Job Prefences') }}
  </button>
</form>
@endsection
