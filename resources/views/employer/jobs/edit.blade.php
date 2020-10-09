@extends('employer.base')

@section('col-9')
<form method="POST" action="{{route('jobs.update', $job->id)}}">
  @method('PATCH')
  @csrf

  <!-- About job-->
  <div class=" card">
    <div class="card-header">Update Job</div>
    <div class="card-body">
      <div class="form-group">
        <label for="title" class="col-form-label">{{ __('Job Title') }}</label>
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
               placeholder="House cleaner" name="title" value="{{ $job->title }}" required>

        @error('title')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="category" class="col-form-label">{{ __('Job Category') }}</label>
        <select class="custom-select  @error('category') is-invalid @enderror" name="category" id="category" required>
          <option @if ($job->category)=== 'House Help') selected @endif value="House Help">House Help
          </option>
          <option @if ($job->category)=== 'Shamba Boy') selected @endif value="Shamba Boy">Shamba Boy</option>
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
            <option @if ($job->type)=== 'Full Time') selected @endif value="Full Time">Full Time</option>
            <option @if ($job->type)=== 'Part Time') selected @endif value="Part Time">Part Time</option>
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
                 value="{{ $job->salary }}" placeholder="15000" required>
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
  <div class="card my-4">
    <div class="card-header">Update Job Description</div>
    <div class="card-body">
      <div class="form-group">
        <label for="job_description" class="col-form-label">{{ __('Job Description') }}</label>
        <textarea class="form-control @error('job_description') is-invalid @enderror" rows="4" name="job_description"
                  placeholder="A description of what the job will involve.">{{ $job->description }}</textarea>
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
  <div class="card my-4">
    <div class="card-header">Update Address and Location</div>
    <div class="card-body">
      <div class="form-row">
        <div class="col">
          <label for="county" class="col-form-label">{{ __('County') }}</label>
          <input id="county" type="text" class="form-control @error('county') is-invalid @enderror"
                 placeholder="Nairobi" name="county" value="{{ $job->county }}" required>
          @error('county')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col">
          <label for="town" class="col-form-label">{{ __('Town / City') }}</label>
          <input id="town" type="text" class="form-control @error('town') is-invalid @enderror" placeholder="Kasarani"
                 name="town" value="{{ $job->town }}" required>
          @error('county')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-form-label">{{ __('Full Address') }}</label>
        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
               placeholder="Nairobi, Kasarani, Roysambu opposite TRM" name="address" value="{{ $job->address }}"
               required>
        @error('address')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
  </div>
  <!--End Address and Location-->

  <button type="submit" class="btn btn-primary btn-block mt-3">
    {{ __('Update Job') }}
  </button>
</form>
@endsection
