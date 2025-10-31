<header id="header" class="header d-flex align-items-center fixed-top" style="background-color: {{ Request::is('/') ? '' : '#15222BD9' }};">
    <div class="container-fluid container position-relative d-flex align-items-center ">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('img/Adsaro white logo.png') }}" style="width: 200px; height: auto; max-height: 80px;" alt="Adsaro Logo">
        </a>
        <style>
            #navmenu a {
              text-decoration: none !important;
            }
          </style>

      <nav id="navmenu" class="navmenu">
        <ul class="fs-6">
          <li><a  href="/"  class=" fs-6 {{ Route::is('/') ? 'active' : '' }}">Home</a></li>


          <li><a class="fs-6 {{ Route::is('services') ? 'active' :''}}" href="{{ route('services') }}">Services</a></li>
          <li><a class="fs-6 {{ Route::is('portfolio') ? 'active' :''}}" href="{{ route('portfolio') }}">Portfolio</a></li>
          <li class="dropdown"><a class="fs-6" href=""><span>Company</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              {{-- <li><a class="fs-6" href="#">Blogs</a></li> --}}
              {{-- <li class="dropdown"><a class="fs-6" href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a class="fs-6" href="#">Deep Dropdown 1</a></li>
                  <li><a class="fs-6" href="#">Deep Dropdown 2</a></li>
                  <li><a class="fs-6" href="#">Deep Dropdown 3</a></li>
                  <li><a class="fs-6" href="#">Deep Dropdown 4</a></li>
                  <li><a class="fs-6" href="#">Deep Dropdown 5</a></li>
                </ul>
              </li> --}}

              <li><a class="fs-6" href="{{ route('aboutus') }}">About</a></li>

              <li><a class="fs-6" href="{{ route('teams') }}">Team</a></li>
              <li><a class="fs-6" href="{{ route('blog') }}">Blogs</a></li>

              <li><a class="fs-6" href="{{ route('termsandcondition') }}">Terms and condition</a></li>
              <li><a class="fs-6" href="{{ route('privacypolicy') }}">Privacy Policy</a></li>
            </ul>
          </li>
          {{-- <li><a target="_blank" class="fs-6 {{ Route::is('store') ? 'active' :''}}" href="{{ route('store') }}">Adsaro Store</a></li> --}}
          <li><a  class="fs-6 {{ Route::is('blog') ? 'active' :''}}" href="{{ route('blog') }}">Blogs</a></li>

          <li><a class="fs-6 {{ Route::is('contact') ? 'active' :''}}" href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      {{-- <a class="cta-btn"  href="{{ route('enquire') }}">Book a Meeting</a> --}}

    </div>
  </header>
