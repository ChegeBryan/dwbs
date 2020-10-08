@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">User name</h1>
        </div>
        @include('employer.partials.sidenav')
      </div>
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          You are an Employer.
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
