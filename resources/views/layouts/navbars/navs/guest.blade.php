<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('admin.home') }}">{{ $titlePage ?? $title }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item{{ $activePage == '/' ? ' active' : '' }}">
            <a href="{{ route('/') }}" class="nav-link">
              <i class="material-icons">dashboard</i> {{__ ('Dashboard')}}
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'store' ? ' active' : '' }}">
            <a href="{{ route('store.index') }}" class="nav-link">
              <i class="material-icons">dashboard</i> {{__ ('Store')}}
            </a>
        </li>
        @auth
            @if (Auth::user()->admin)
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="material-icons">dashboard</i> Админка
                    </a>
                </li>
            @endif
            <li class="nav-item ">
                <a href="{{ route('admin.profile.edit') }}" class="nav-link">
                    <i class="material-icons">face</i> {{ __('Profile') }}
                </a>
            </li>
        @else
            <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
                <a href="{{ route('register') }}" class="nav-link">
                    <i class="material-icons">person_add</i> {{ __('Register') }}
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
                <a href="{{ route('login') }}" class="nav-link">
                    <i class="material-icons">fingerprint</i> {{ __('Login') }}
                </a>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>


<!-- End Navbar -->
