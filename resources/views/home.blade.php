@extends('layouts.app')
@section('custom_css')
<style>
.bg {
  background-image: url("{{asset('img/bg.jpeg')}}");
  height: 80vh;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center align-items-center bg">
    <div class="col-md-8">
      <h1>Find your preferred domestic work in minutes.</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua.</p>
      <form>
        <div class="form-group">
          <input type="text" class="form-control" id="keywords" placeholder="Keyword e.g. (Job Title, Description)">
        </div>
        <div class="form-row">
          <div class="form-group col">
            <select id="category" class="custom-select">
              <option selected disabled>Category</option>
              <option>Househelp boy</option>
              <option>Shamba boy</option>
            </select>
          </div>
          <div class="form-group col">
            <select id="location" class="custom-select">
              <option selected>Select location</option>
              <option>Location 1</option>
              <option>Location 2</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
