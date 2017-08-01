<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
        <div class="dropdown profile-element">
          <span>
            <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
          </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
              <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->fullname() }}</strong> </span>
              <span class="text-muted text-xs block">Administrator <b class="caret"></b></span>
            </span>
          </a>
          <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="profile.html">Profile</a></li>
            <li class="divider"></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div>
        <div class="logo-element">
          JL+
        </div>
      </li>
      <li class="active"> {{-- Dashboard. --}}
        <a href="{{ route('admin.dash') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
      </li>
      <li> {{-- Events --}}
        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="nav-label">Events </span><span class="label label-warning pull-right">16/24</span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('events.index') }}">View Events</a></li>
          <li><a href="{{ route('events.create') }}">Add Events</a></li>
        </ul>
      </li>
      <li> {{-- Organisers --}}
        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="nav-label">Organisers</span><span class="label label-warning pull-right">16/24</span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('organisers.index') }}">View Organiser</a></li>
          <li><a href="{{ route('organisers.create') }}">Add Organiser</a></li>
        </ul>
      </li>
      <li> {{-- Sponsors --}}
        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="nav-label">Sponsors</span><span class="label label-warning pull-right">16/24</span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="#">View Sponsors</a></li>
          <li><a href="#">Add Sponsors</a></li>
        </ul>
      </li>
      <li> {{-- Users --}}
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Users</span><span class="label label-warning pull-right">16/24</span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="{{ route('organisers.index') }}">View Users</a></li>
          <li><a href="{{ route('organisers.create') }}">Add Users</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
