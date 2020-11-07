@extends('employer.base')

@section('col-9')
<div class="table-responsive-sm">
  <table class="table">
    <thead class="bg-gradient-primary text-white">
      <tr>
        <th class="py-4 pl-5">Job Title</th>
        <th class="py-4 pl-5">Application</th>
        <th class="py-4">Action</th>
      </tr>
    </thead>
    <tbody class="border">
      @foreach($jobs as $job)
      <tr>
        <td class="py-3 pr-0 pl-5">
          <h6><a href="{{ route('jobs.show', $job->id) }}"
               class="text-decoration-none text-dark">{{ucfirst($job->title)}}</a>
          </h6>
          <p class="text-muted font-14"><i class="far fa-calendar fa-fw"></i>Date Posted :
            {{date('d-m-Y', strtotime($job->created_at))}}</p>
        </td>
        <td class="py-4 pr-0 pl-5">
          <p>
            <span class="text-info">Position Filled</span>
          </p>
        </td>
        <td class="py-4 pr-0 pl-4 pr-2">
          <ul class="list-inline">
            <li class="list-inline-item mr-3"><a href="{{route('jobs.show',  $job->id)}}" class="text-dark"><i
                   class="fas fa-eye fa-fw"></i></a></li>
            <li class="list-inline-item">
              <form action="{{ route('jobs.destroy', $job->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a href="" class="text-dark" onclick="this.closest('form').submit();return false;"><i
                     class="fas fa-trash-alt fa-fw"></i></a>
              </form>
            </li>
          </ul>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="d-flex justify-content-center pt-5">
  {{ $jobs->links() }}
</div>

@endsection
