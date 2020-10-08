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
        <button type="submit" class="btn btn-primary btn-block">Search</button>
      </form>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-n4"><button class="btn btn-primary btn-lg rounded-circle"><i
         class="fas fa-angle-double-down fa-fw"></i></button></div>
</div>

<div class="container py-4 jobs">
  <h1 class="text-center">Latest Jobs Posted</h1>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Job Title</th>
          <th scope="col">Employer</th>
          <th scope="col">City</th>
          <th scope="col">Compensation</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>
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
