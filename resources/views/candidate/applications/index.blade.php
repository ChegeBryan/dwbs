@extends('candidate.base')

@section('col-9')
<h6 class="border p-4 bg-danger text-white">Open Jobs</h6>
<div class="table-responsive-sm pt-3">
  <table class="table" id="dataTable">
    <thead>
      <tr>
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
        <td class="py-5">{{ucwords($job->title)}}</td>
        <td class="py-5">{{ucwords($job->type)}}</td>
        <td class="py-5">{{ucwords($job->user->name)}}</td>
        <td class="py-5">{{ucwords($job->category)}}</td>
        <td class="py-5">{{ucwords($job->address)}}</td>
        <td class="py-5">Ksh. {{number_format($job->salary, 2)}}</td>
        <td class="py-5">
          <a class="btn btn-outline-danger" href="{{ route('job.candidate', $job->id) }}">View Details</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endsection
