@extends('candidate.base')

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

    <h5 class="card-title">Job Description</h5>
    <p class="card-text">{{$job->description}}</p>

    <hr>

    <h5 class="card-title">Job Location</h5>
    <p class="card-text"><span class="font-weight-bolder"><i class="fas fa-map fa-fw"></i> County:</span>
      {{$job->county}}</p>
    <p class="card-text"><span class="font-weight-bolder"><i class="fas fa-map-signs fa-fw"></i> Town:</span>
      {{$job->town}}
    </p>
    <p class="card-text"><span class="font-weight-bolder"><i class="fas fa-map-marker-alt fa-fw"></i> Full
        Address:</span>
      {{$job->address}}</p>


    <hr>

    <p class="card-text"><span class="font-weight-bolder"><i class="fas fa-clipboard-list"></i> Applications: </span>
      {{ count($job->applications) }}</p>

  </div>

</div>
@endsection
