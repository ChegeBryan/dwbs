@extends('employer.base')

@section('col-9')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between">
      <h4 class="card-title">{{ucfirst($job->title)}}</h4>
      <p class="text-dark"><i class="fas fa-money-bill-alt fa-fw mr-1"></i>Ksh. {{$job->salary}}</p>
    </div>
    <div class="d-flex justify-content-between">
      <h6 class="card-subtitle mt-1">{{$job->category}}</h6>
      <p class="text-muted"><i class="far fa-clock fa-fw"></i>{{$job->type}}</p>
    </div>

    <div class="card-text">
      <h5>Job Description</h5>
      <p>{{$job->description}}</p>
    </div>

    <div class="card-text">
      <p><i class="fas fa-map-marker-alt"></i> {{$job->address}}</p>
    </div>

    <hr>

    <h5 class="pt-4">Applicants</h5>
    @foreach($job->applications as $application)
    <div class="list-group">
      <div class="list-group-item d-flex justify-content-between">
        <div class="media">
          <div class="media-left"><img src="https://webstrot.com/html/jbdesk/main_version/dashboard/images/rs1.jpg"
                 alt="thumbnail" class="d-block media-object"></div>
          <div class="pl-3  media-body">
            <h4 class="pl-3 m-0">{{$application->candidate->name}}</h4>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <button class="text-white btn btn-danger">Pick</button>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
