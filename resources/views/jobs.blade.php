@extends('layouts.app')

@section('content')

<div class="container py-5 jobs">
  <h1 class="text-center">Jobs</h1>
  <div class="table-responsive-sm pt-3">
    <table class="table" id="dataTable">
      <thead>
        <tr>
          <th scope="col">Job Id</th>
          <th scope="col">Job Title</th>
          <th scope="col">Job Type</th>
          <th scope="col">Posted By</th>
          <th scope="col">Looking for</th>
          <th scope="col">Located at</th>
          <th scope="col">Salary</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobs as $job)
        <tr>
          <td>{{ucwords($job->id)}}</td>
          <td>{{ucwords($job->title)}}</td>
          <td>{{ucwords($job->type)}}</td>
          <td>{{ucwords($job->user->name)}}</td>
          <td>{{ucwords($job->category)}}</td>
          <td>{{ucwords($job->address)}}</td>
          <td>Ksh. {{number_format($job->salary, 2)}}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('job.candidate', $job->id) }}">Apply</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endsection
