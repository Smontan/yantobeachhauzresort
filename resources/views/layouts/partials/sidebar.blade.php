<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="mdi mdi-speedometer menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#reservation" aria-expanded="false" aria-controls="reservation">
          <i class="mdi mdi-ticket menu-icon"></i>
          <span class="menu-title">Reservations</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="reservation">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a href="{{url('admin/reservation/create')}} " class="nav-link">Add Reservations</a></li>
            <li class="nav-item"> <a href="{{url('admin/reservation/view')}}" class="nav-link">View Reservations</a></li>
            <li class="nav-item"> <a href="{{url('admin/reservation/history')}}" class="nav-link">History</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#room" aria-expanded="false" aria-controls="room">
          <i class="mdi mdi-room-service menu-icon"></i>
          <span class="menu-title">Rooms</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="room">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a href="{{url('admin/room/create')}} " class="nav-link">Add Room</a></li>
            <li class="nav-item"> <a href="{{url('admin/room')}}" class="nav-link">View Room</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=" {{url('admin/category')}} ">
          <i class="mdi mdi-card menu-icon"></i>
          <span class="menu-title">Categories (Room Type)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=" {{url('/admin/amenity')}} ">
          <i class="mdi mdi-gift menu-icon"></i>
          <span class="menu-title">Amenities</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/users')}}">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#web_page" aria-expanded="false" aria-controls="web_page">
          <i class="mdi mdi-arrange-bring-forward menu-icon"></i>
          <span class="menu-title">Web Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="web_page">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a href="{{url('admin/web_page/create')}} " class="nav-link">Add page</a></li>
            <li class="nav-item"> <a href="{{url('admin/web_page')}}" class="nav-link">View web pages</a></li>
          </ul>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/promotion')}}">
          <i class="mdi mdi-file menu-icon"></i>
          <span class="menu-title">Promotions</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li> --}}
      
    </ul>
  </nav>