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

    <h5 class="card-title">Employer</h5>
    <p class="card-text">{{$job->user->name}}</p>

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

    <p class="card-text"><span class="font-weight-bolder"><i class="fas fa-clipboard-list"></i> Applications:
      </span>
      {{ count($job->applications) }}</p>


    <p class="card-text"><span class="font-weight-bolder"><i class="fas fa-clock"></i> Posted on:
      </span>
      {{ date('d F Y', strtotime($job->created_at)) }}</p>

    @if($job->applications->count() > 0)
    @foreach($job->applications as $application)
    @if($application->candidate->id == Auth::user()->id)
    <div class="d-flex justify-content-around">
      <button class="btn btn-outline-success">Already Applied</button>
      <form action="{{ route('application.destroy', $application->id ) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">Delete Application</button>
      </form>
    </div>
    @else
    <form action="{{ route('application.store') }}" method="POST">
      @csrf
      <input type="hidden" value="{{$job->id}}" name="job">
      <button type="submit" class="btn btn-outline-danger btn-block">Apply</button>
    </form>
    @endif
    @endforeach
    @else
    <form action="{{ route('application.store') }}" method="POST">
      @csrf
      <input type="hidden" value="{{$job->id}}" name="job">
      <button type="submit" class="btn btn-outline-danger btn-block">Apply</button>
    </form>
    @endif
  </div>

</div>
@endsection
