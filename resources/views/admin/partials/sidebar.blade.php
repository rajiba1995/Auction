<div class="sidebar-menu" id="sideMenu">
  <div class="logo">
    <a href="{{route('admin.dashboard')}}">
      <img src="{{asset('admin/assets/images/auction_logo.png')}}" alt="Logo">
    </a>
  </div>
  <div class="accordion menu-accordions-list" id="menusAccordion">
    <div class="accordion-item">
      <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/master*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse1">
        <i class="fa-solid fa-bars-progress"></i>
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
            <a class="nav-link {{ (request()->is('admin/master/buyer-package*')) ? 'active' : '' }}" href="{{route('admin.buyer.package.index')}}">Buyer-Packages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/master/seller-package*')) ? 'active' : '' }}" href="{{route('admin.seller.package.index')}}">Seller-Packages</a>
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
      <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/employee*') || request()->is('admin/role*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse4">
        <i class="fa-solid fa-user-shield"></i>
        Employee Management
        <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
        <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
      </a>
      <div class="accordion-collapse collapse {{ (request()->is('admin/employee*') || request()->is('admin/role*')) ? 'show' : '' }}" id="collapse4" data-bs-parent="#menusAccordion">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/employee*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.employee.index')}}">Employees</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/role*')) ? 'active' : '' }}" href="{{route('admin.role.index')}}">Role</a>
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
      <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/location*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse5">
        <i class="fa-solid fa-location-dot"></i>
        Location Management
        <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
        <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
      </a>
      <div class="accordion-collapse collapse {{ (request()->is('admin/location*')) ? 'show' : '' }}" id="collapse5" data-bs-parent="#menusAccordion">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/location*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.location.states.index')}}">Location</a>
          </li>
        </ul>
      </div>
    </div> 
    <div class="accordion-item">
      <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/payment-management*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse6">
        <i class="fa-solid fa-money-bill-1-wave"></i>
        Payment Management
        <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
        <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
      </a>
      <div class="accordion-collapse collapse {{ (request()->is('admin/payment-management/badge*')) ? 'show' : '' }}" id="collapse6" data-bs-parent="#menusAccordion">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/payment-management/badge*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.badge.index')}}">Badge List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/payment-management/transaction*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.transaction.index')}}">Transaction</a>
          </li>
        </ul>
      </div>
    </div> 
    <div class="accordion-item">
      <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/inquiry-management*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse7">
        <i class="fa-solid fa-chart-simple"></i>
        Inquiry Management
        <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
        <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
      </a>
      <div class="accordion-collapse collapse {{ (request()->is('admin/inquiry-management/inquiry*')) ? 'show' : '' }}" id="collapse7" data-bs-parent="#menusAccordion">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/inquiry-management/inquiry*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.inquiry.index')}}">Inquiry</a>
          </li>
        </ul>
      </div>
    </div> 
    <div class="accordion-item">
      <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/cancell-reason-management*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#collapse8">
        <i class="fa-solid fa-circle-xmark"></i>
        {{-- <i class="fa-regular fa-circle-xmark"></i> --}}
        Cancelled Reason Management
        <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
        <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
      </a>
      <div class="accordion-collapse collapse {{ (request()->is('admin/cancell-reason-management*')) ? 'show' : '' }}" id="collapse8" data-bs-parent="#menusAccordion">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/cancell-reason-management/buyer*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.buyer_cancell_reason.index')}}">Buyer Cancell Reason</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/cancell-reason-management/seller*')) ? 'active' : '' }}" aria-current="page" href="{{route('admin.seller_cancell_reason.index')}}">Seller Cancell Reason</a>
          </li>
        </ul>
      </div>
    </div> 
    <div class="accordion-item">
      <a href="javascript:void(0)" class="accordion-button {{ (request()->is('admin/setting*')) ? 'active' : '' }} " data-bs-toggle="collapse" data-bs-target="#collapse3">
        <i class="fa-solid fa-gear"></i>
        Settings
        <img src="{{asset('admin/assets/images/up-arrow-black.png')}}" alt="arrow" class="indicator i-black">
        <img src="{{asset('admin/assets/images/up-arrow-white.png')}}" alt="arrow" class="indicator i-white">
      </a>
      <div class="accordion-collapse collapse {{ (request()->is('admin/setting*')) ? 'show' : '' }}" id="collapse3" data-bs-parent="#menusAccordion">
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
        <i class="fa-solid fa-right-from-bracket"></i>
        Logout
      </a>
    </div>
  </div>
</div>