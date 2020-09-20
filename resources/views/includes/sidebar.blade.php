  <!-- aside -->
  <div id="aside" class="app-aside modal fade folded md nav-expand">
  	<div class="left navside indigo-900 dk" layout="column">
      <div class="navbar navbar-md no-radius">
        <!-- brand -->
        <a class="navbar-brand">
        	<div ui-include="'{{ asset('flatkit/assets/images/logo.svg') }}'"></div>
        	<img src="{{ asset('flatkit/assets/images/logo.png') }}" alt="." class="hide">
        	<span class="hidden-folded inline">Bank Indonesia</span>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-active-blue">
          <ul class="nav" ui-nav>
            @if (Auth::user()->role == 'admin')
              <li class="nav-header hidden-folded">
                <small class="text-muted">Administrator</small>
              </li>

              <li class="{{ request()->is('/') ? ' active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                  <span class="nav-icon">
                    <i class="fa fa-area-chart"></i>
                  </span>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>

              <li class="{{ request()->is('brand') ? ' active' : '' }}">
                <a href="{{ route('brand') }}">
                  <span class="nav-icon">
                    <i class="fa fa-adn"></i>
                  </span>
                  <span class="nav-text">Brand</span>
                </a>
              </li>

              <li class="{{ request()->is('mobil') ? ' active' : '' }}">
                <a href="{{ route('admin.mobil') }}">
                  <span class="nav-icon">
                    <i class="fa fa-car"></i>
                  </span>
                  <span class="nav-text">Mobil</span>
                </a>
              </li>

              <li class="{{ request()->is('treatment') ? ' active' : '' }}">
                <a href="{{ route('treatment') }}">
                  <span class="nav-icon">
                    <i class="fa fa-plus-square"></i>
                  </span>
                  <span class="nav-text">Treatment</span>
                </a>
              </li>

              <li class="{{ request()->is('driver') ? ' active' : '' }}">
                <a href="{{ route('admin.driver') }}">
                  <span class="nav-icon">
                    <i class="fa fa-group"></i>
                  </span>
                  <span class="nav-text">Drivers</span>
                </a>
              </li>

              <li class="nav-header hidden-folded">
                <small class="text-muted">Profile</small>
              </>

              <li>
                <a href="widget.html" >
                  <span class="nav-icon">
                    <i class="fa fa-user"></i>
                  </span>
                  <span class="nav-text">My Profile</span>
                </a>
              </li>
            @else
            <li class="nav-header hidden-folded">
              <small class="text-muted">Laporan</small>
            </li>

            <li class="{{ request()->is('log/create') ? ' active' : '' }}">
              <a href="{{ route('log.create') }}" >
                <span class="nav-icon">
                  <i class="fa fa-car"></i>
                </span>
                <span class="nav-text">Mobil</span>
              </a>
            </li>

            <li class="{{ request()->is('log') ? ' active' : '' }}">
              <a href="{{ route('log') }}" >
                <span class="nav-icon">
                  <i class="fa fa-newspaper-o"></i>
                </span>
                <span class="nav-text">Data Laporan</span>
              </a>
            </li>

            <li class="nav-header hidden-folded">
              <small class="text-muted">Profil</small>
            </li>

            <li class="{{ request()->is('myprofile') ? ' active' : '' }}">
              <a href="{{ route('profile') }}" >
                <span class="nav-icon">
                  <i class="fa fa-user"></i>
                </span>
                <span class="nav-text">Profil</span>
              </a>
            </li>

            <li class="{{ request()->is('setting/*') ? ' active' : '' }}">
              <a href="{{ route('settings') }}" >
                <span class="nav-icon">
                  <i class="fa fa-gear"></i>
                </span>
                <span class="nav-text">Pengaturan</span>
              </a>
            </li>

            @endif
</ul>
  </nav>
    </div>
    <div flex-no-shrink>
        {{-- <div ui-include="'{{ asset('flatkit') }}/views/blocks/aside.bottom.0.blade.php'"></div> --}}
        <nav ui-nav>
          <ul class="nav">
              <li>
                  <div class="b-b b m-t-sm"></div>
              </li>
              <li class="no-bg">
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      <span class="nav-icon">
                          <i class="material-icons">&#xe8ac;</i>
                      </span>
                      <span class="nav-text">Logout</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                  </form>
              </li>
          </ul>
      </nav>
    </div>
  </div>
</div>
<!-- / aside -->
