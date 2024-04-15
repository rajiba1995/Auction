
<div class="sidebar-menu" id="sideMenu">
  <div class="logo">
      <a href="{{route('admin.dashboard')}}">
          <img src="{{asset('admin/assets/images/auction_logo.png')}}" alt="Logo">
      </a>
  </div>
  <div class="accordion menu-accordions-list" id="menusAccordion">
      <div class="accordion-item">
          <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/master*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse1">
              <i class="fa-solid fa-table"></i>
              Master Management
              <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
              <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
          </a>
          <div class="accordion-collapse collapse {{ (request()->is('admin/master*')) ? 'show' : '' }}" id="collapse1" data-bs-parent="#menusAccordion">
              <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/banner*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.banner.index')}}">Banner</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/category*')) ? 'active' : '' }}" href="{{route('admin.collection.index')}}">Categories</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/sub-category*')) ? 'active' : '' }}" href="{{route('admin.category.index')}}">Sub- categories</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/tutorial*')) ? 'active' : '' }}" href="{{route('admin.tutorial.index')}}">Tutorials</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/client*')) ? 'active' : '' }}" href="{{route('admin.client.index')}}">Our Clients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/feedback*')) ? 'active' : '' }}" href="{{route('admin.feedback.index')}}">feedbacks</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/blog*')) ? 'active' : '' }}" href="{{route('admin.blog.index')}}">Blogs</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/package*')) ? 'active' : '' }}" href="{{route('admin.package.index')}}">Packages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/business-type*')) ? 'active' : '' }}" href="{{route('admin.business.index')}}">Business Type</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/master/legal-status*')) ? 'active' : '' }}" href="{{route('admin.legalstatus.index')}}">Legal Status</a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="accordion-item">
        <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/user*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse2">
            <i class="fa-solid fa-users"></i>
            User Management
            <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
            <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
        </a>
        <div class="accordion-collapse collapse {{ (request()->is('admin/user*')) ? 'show' : '' }}" id="collapse2" data-bs-parent="#menusAccordion">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.user.index')}}">Users</a>
                </li>
                
            </ul>
        </div>
    </div>
      <div class="accordion-item">
          <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/setting*')) ? 'active' : '' }} " data-bs-toggle="collapse" data-bs-target="#collapse3">
              <i class="fa-solid fa-box-archive"></i>
              Settings
              <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
              <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
          </a>
          <div class="accordion-collapse collapse {{ (request()->is('admin/setting*')) ? 'show' : '' }}"" id="collapse3" data-bs-parent="#menusAccordion">
              <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/setting/social-media*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.social_media.index')}}">Social Media</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Link 2</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/setting/website-settings*')) ? 'active' : '' }}" href="{{ route('admin.website-settings.index')}}">Website Settings</a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="accordion-item non-accordion-item">
          <a href="javascript:void(0)" class="accordion-button collapsed">
              <i class="fa-regular fa-image"></i>
              Logout
          </a>
      </div>
  </div>
</div>