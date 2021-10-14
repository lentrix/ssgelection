<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            @if(auth()->guest())
            <li class="nav-item">
                <a class="nav-link" href="{{url('/verification')}}">Verification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/login')}}">Login</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Attendance
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('/activities')}}">Activities</a></li>
                    <li><a class="dropdown-item" href="{{url('/activities/individual-report')}}">Individual Report</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{url('/activities/summary')}}">Activity Summary</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Videos</a>
                <ul class="dropdown-menu">
                    @foreach(\App\Models\ViewableEvent::orderBy('title')->get() as $ve)
                        <li><a href='{{url("/viewable-events/$ve->id/0")}}' class="dropdown-item">{{$ve->title}}</a></li>
                    @endforeach
                    @if(auth()->user()->is_admin)
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{url('/viewable-events')}}" class="dropdown-item">Viewable Events</a></li>
                    @endif
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Election
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('/candidates')}}">Candidates</a></li>
                    <li><a class="dropdown-item" href="{{url('/election')}}">Vote Now</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{url('/results')}}">Results</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Raffles
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('/raffles/items')}}">Raffle Items</a></li>
                    <li><a class="dropdown-item" href="{{url('/raffles/winners')}}">Raffle Winners</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{url('/raffles/draw')}}">Raffle Draw</a></li>
                </ul>
            </li>
            @if(auth()->user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/users')}}">Users</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{url('/logout')}}">Logout</a>
            </li>
            @endif
        </ul>
      </div>
    </div>
</nav>
