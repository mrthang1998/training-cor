<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{route('dashboard')}}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('user.index')}}">User Manager <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">User Profile</a>
              <a class="dropdown-item" href="#">Change Password</a>
              <div class="dropdown-divider"></div>
              <!-- log out -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link class="dropdown-item" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </div>
        </li>
      </ul>
    </div>
  </nav>