<div class="card">
  <img class="card-img-top" src="{{ asset('img/default2.png')}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ ucwords(Auth::user()->name) }}</h5>
    <h6 class="card-subtitle">{{ ucwords(Auth::user()->mobile) }}</h6>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('candidate.index') }}"><i
           class="fas fa-briefcase fa-fw mx-2 text-danger"></i> Applied Jobs</a></li>
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('application.index') }}"><i
           class="fas fa-clipboard-list fa-fw mx-2 text-danger"></i> Jobs Catalog</a></li>
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary"
         href="{{route('candidate.edit', Auth::user()->id)}}"><i class="fas fa-edit fa-fw mx-2 text-danger"></i> Job
        Preferences</a></li>
  </ul>

  <ul class="list-group list-group-flush border-top-0">
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary"
         href="{{route('candidate.account.edit', Auth::user()->id)}}"><i
           class="fas fa-user-edit fa-fw mx-2 text-danger"></i>
        Edit
        Profile</a></li>
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="#"
         onclick="event.preventDefault(); document.getElementById('delete_account').submit();"><i
           class="fas fa-edit fa-fw mx-2 text-danger"></i> Delete Account</a>
      <form id="delete_account" action="{{ route('candidate.account.destroy', Auth::user()->id) }}" method="POST"
            style="display: none;">
        @csrf
        @method('DELETE')
      </form>
    </li>
    <li class="list-group-item list-group-item-action border-0"><a
         class="pl-2 stretched-link text-decoration-none text-secondary" href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
           class="fas fa-sign-out-alt fa-fw mx-2 text-danger"></i> Logout</a>
    </li>
  </ul>

</div>
