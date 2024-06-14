
<div class="sidebar-menu" id="sideMenu">
  <div class="logo">
      <a href="{{route('admin.dashboard')}}">
          <img src="{{asset('admin/assets/images/auction_logo.png')}}" alt="Logo">
      </a>
  </div>
  <div class="accordion menu-accordions-list" id="menusAccordion">
      <div class="accordion-item">
          <a href="javascript:void(0)" class="accordion-button {{ (request()->is('employee/master*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse1">
              <i class="fa-solid fa-bars-progress"></i>
              My Activity
              <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
              <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
          </a>
          <div class="accordion-collapse collapse {{ (request()->is('employee/master*')) ? 'show' : '' }}" id="collapse1" data-bs-parent="#menusAccordion">
              <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('employee/master/attandance*')) ? 'active' : '' }}" aria-current="page" href="{{route('employee.attandance.index')}}">Attandance</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('employee/master/sellers*')) ? 'active' : '' }}" aria-current="page" href="{{ route('employee.sellers.index') }}">Users</a>
                  </li>
                 
              </ul>
          </div>
      </div>
      
      <div class="accordion-item non-accordion-item">
          <a href="javascript:void(0)" class="accordion-button collapsed">
            <i class="fa-solid fa-right-from-bracket"></i>
              Logout
          </a>
      </div>
  </div>
</div>