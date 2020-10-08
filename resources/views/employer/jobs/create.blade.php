@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-3">
      @include('employer.partials.sidenav')
    </div>
    <div class="col-md-9">
      <form>
        <!-- About job-->
        <div class="card">
          <div class="card-header">Post New Job</div>
          <div class="card-body">
            <div class="form-group">
              <label for="title" class="col-form-label">{{ __('Job Title') }}</label>
              <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                     value="{{ old('title') }}" required autofocus>

              @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="category" class="col-form-label">{{ __('Job Category') }}</label>
              <select class="custom-select  @error('category') is-invalid @enderror" name="category" id="category"
                      required>
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
                <label for="salary" class="col-form-label">{{ __('Salary') }}</label>
                <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror"
                       name="salary" value="{{ old('salary') }}" required>
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

        <!--JOb description -->
        <div class="card my-5">
          <div class="card-header">About Job</div>
          <div class="card-body">
            <div class="form-group">
              <label for="job_description" class="col-form-label">{{ __('Job Description') }}</label>
              <textarea class="form-control @error('job_description') is-invalid @enderror" rows="4"
                        name="job_description"></textarea>
              @error('job_description')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
        </div>
        <!--End job description -->

        <!--Address and Location-->

        <!--End Address and Location-->
      </form>
    </div>
  </div>
</div>
@endsection
