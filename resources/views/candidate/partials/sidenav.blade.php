<div class="card">
  <div class="card-body">
    <i class="card-img-top far fa-user fa-8x text-center text-info mb-3"></i>
    <h5 class="card-title">{{ ucwords(Auth::user()->name) }}</h5>
    <h6 class="card-subtitle">{{ ucwords(Auth::user()->mobile) }}</h6>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('candidate.index')}}"> <i
           class="fas fa-tachometer-alt fa-fw mx-2 text-danger"></i> Dashboard</a>
    </li>
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="#"><i
           class="fas fa-edit fa-fw mx-2 text-danger"></i> Profile</a></li>
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('candidate.index') }}"><i
           class="fas fa-briefcase fa-fw mx-2 text-danger"></i> Applied Jobs</a></li>
  </ul>

  <ul class="list-group list-group-flush border-top-0">
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="#"> <i
           class="fas fa-sign-out-alt fa-fw mx-2 text-danger"></i> Logout</a>

    </li>
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="#"><i
           class="fas fa-edit fa-fw mx-2 text-danger"></i> Delete Account</a></li>
  </ul>

</div>
