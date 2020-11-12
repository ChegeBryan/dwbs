@extends('layouts.app')
@section('custom_css')
<style>
.bg {
  background-image: url("{{asset('img/cover.png')}}");
  height: 60vh;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
@endsection

@section('content')
<div class="bg">
</div>
<div class="container-fluid">
  <div class="d-flex justify-content-center mt-n4"><button class="btn btn-primary btn-lg rounded-circle"><i
         class="fas fa-angle-double-down fa-fw"></i></button></div>
</div>

<div class="container py-5 jobs">
  <h1 class="text-center">Latest Jobs Posted</h1>
  <div class="table-responsive-sm pt-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Job Title</th>
          <th scope="col">Posted By</th>
          <th scope="col">Town</th>
          <th scope="col">Salary</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobs as $job)
        <tr>
          <td>{{ucwords($job->title)}}</td>
          <td>{{ucwords($job->user->name)}}</td>
          <td>{{ucwords($job->town)}}</td>
          <td>Ksh. {{number_format($job->salary, 2)}}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('job.candidate', $job->id) }}">Apply</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <hr>

  <div class="d-flex justify-content-between">
    <p>Showing {{count($jobs)}} of {{$all_jobs}} latest jobs.</p>
    <a href="{{route('jobs')}}" class="text-primary text-decoration-none">See all jobs <i
         class="fas fa-long-arrow-alt-right"></i></a>
  </div>
</div>

<script>
$(document).ready(function() {
  $("button").click(function() {
    $('html,body').animate({
        scrollTop: $(".jobs").offset().top
      },
      'slow');
  });
})
</script>
@endsection
