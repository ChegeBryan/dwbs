<div class="card">
  <div class="card-body">
    <i class="card-img-top far fa-user fa-8x text-center text-info mb-3"></i>
    <h5 class="card-title">{{ ucwords(Auth::user()->name) }}</h5>
    <h6 class="card-subtitle">{{ ucwords(Auth::user()->mobile) }}</h6>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-action"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="#"> <i
           class="fas fa-tachometer-alt fa-fw mx-2 text-primary"></i> Dashboard</a>
    </li>
    <li class="list-group-item list-group-item-action"><a
         class="pl-2 stretched-link text-decoration-none text-secondary"
         href="{{ route('account.edit', Auth::user()->id)}}"><i class="fas fa-edit fa-fw mx-2 text-primary"></i> Edit
        Profile</a></li>
    <li class="list-group-item list-group-item-action"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('jobs.create') }}"><i
           class="fas fa-user-plus fa-fw mx-2 text-primary"></i> Post New Job</a></li>
    <li class="list-group-item list-group-item-action"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('jobs.index') }}"><i
           class="fas fa-briefcase fa-fw mx-2 text-primary"></i> Manage Jobs</a></li>
    <li class="list-group-item list-group-item-action"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('jobs.closed') }}"><i
           class="fas fa-clipboard-list fa-fw mx-2 text-primary"></i>Closed Jobs</a></li>
  </ul>
</div>
