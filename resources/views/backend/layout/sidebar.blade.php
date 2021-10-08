<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{ route('home') }}" class="sidebar-brand">
      Dash<span>board</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">


        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>

        @if (Auth::user()->role != 'user')
          <li class="nav-item nav-category">Manage Property</li>
          <li class="nav-item">
            <a href="{{ route('dashboard.property') }}" class="nav-link">
              <i class="link-icon" data-feather="home"></i>
              <span class="link-title">Property</span>
            </a>
          </li>

          <li class="nav-item nav-category">Customers</li>
          <li class="nav-item">
            <a href="{{ route('dashboard.rent.list') }}" class="nav-link">
              <i class="link-icon" data-feather="dollar-sign"></i>
              <span class="link-title">Rent List</span>
            </a>
          </li>

          <li class="nav-item nav-category">Rounting</li>
          <li class="nav-item">
            <a href="{{ route('dashboard.map') }}" class="nav-link">
              <i class="link-icon" data-feather="map"></i>
              <span class="link-title">Map</span>
            </a>
          </li>

         
          <li class="nav-item nav-category">Property</li>
          <li class="nav-item">
            <a href="{{ route('property') }}" class="nav-link">
              <i class="link-icon" data-feather="home"></i>
              <span class="link-title">Add Property</span>
            </a>
          </li>
        @endif

      </ul>
    </div>
</nav>
