@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-3">
      @include('candidate.partials.sidenav')
    </div>
    <div class="col-md-9">
      @yield('col-9')
    </div>
  </div>
</div>
@endsection
