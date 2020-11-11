@extends('candidate.base')

@section('col-9')

<h6 class="border p-4 bg-danger text-white">Applied Jobs</h6>
@foreach($applications as $application)
<div class="p-3 d-p-sm-0 mt-3 rounded-0 card">
  <div class="pl-2 row">
    <div class="col-md-8 col-sm-12 col-xs-12">
      <div class="p-2 media">
        <div class="pl-5 pr-5 align-self-center media-body"><a
             href="{{ route('job.candidate', $application->job->id) }}"
             class="text-decoration_none text-dark font-weight-bold">{{ucfirst($application->job->title)}}</a>
          <ul class="m-0 mt-2 p-0 list-unstyled">
            <li class="mr-3 text-secondary">
              <i class="fas fa-wallet fa-fw text-danger mr-1"></i> Ksh. {{$application->job->salary}}
            </li>
            <li class="mt-2 text-secondary"><i class="fas fa-map-marker-alt text-danger mr-1"></i>
              {{$application->job->address}}</li>
          </ul>
        </div>
      </div>
    </div>
    <div class=" col-md-4 col-sm-12 col-xs-12 ">
      <ul class="d-flex text-left text-md-right flex-column justify-content-between">
        <li class=" p-2 d-inline-block">
          <button class="btn btn-outline-success btn-sm">{{$application->job->type}}</button>
        </li>
        <li class=" p-2 d-inline-block">
          <form action="{{ route('application.destroy', $application->id ) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>
@endforeach


<div class="d-flex justify-content-center pt-5">
  {{ $applications->links() }}
</div>

@endsection
