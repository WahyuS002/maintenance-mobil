<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
              <img class="img-xs rounded-circle" src="{{ asset('staradmin/assets/images/faces/face8.jpg') }}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Allen Moreno</p>
            <p class="designation">Premium user</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.driver') }}">
          <i class="menu-icon typcn typcn-shopping-bag"></i>
          <span class="menu-title">Driver</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.mobil') }}">
          <i class="menu-icon typcn typcn-th-large-outline"></i>
          <span class="menu-title">Mobil</span>
        </a>
      </li>       --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">Mobil</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.mobil') }}"> Semua </a>
            </li>
            @foreach ($brands as $brand)         
              <li class="nav-item">
                <a class="nav-link" href="/brand/{{ $brand->nama_brand }}"> {{ $brand->nama_brand }} </a>
              </li>              
            @endforeach
          </ul>
        </div>
      </li>
    </ul>
  </nav>