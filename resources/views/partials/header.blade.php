<header class="header">
    <!-- Topbar -->
    <section class="topbar d-none d-md-block">
        <div class="container py-2">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-section mb-2 mb-md-0">
                    <div class="info text-center text-md-start">
                        <span class="text-sm me-3 mb-2">Appointment: {{ $sitesettings->phone_number1 }}</span>
                        <span class="text-sm">Emergency: {{ $sitesettings->phone_number2 }}</span>
                    </div>
                </div>
                <div class="social-icons col-12 col-md-6 text-center text-md-end">
                    <a href="{{ $sitesettings->link1 }}" class="icons fab fa-facebook-square mx-1" aria-label="Facebook"></a>
                    <a href="{{ $sitesettings->link2 }}" class="icons fab fa-instagram-square mx-1" aria-label="Instagram"></a>
                    <a href="{{ $sitesettings->link3 }}" class="icons fab fa-twitter-square mx-1" aria-label="Twitter"></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Topbar end -->
  
    <!-- Logo and Button -->
    <section class="logo-and-button">
      <nav class="navbar navbar-expand-lg bg-light navbar-light">
          <div class="container d-flex justify-content-between align-items-center">
              <a class="navbar-brand mx-auto mx-md-0" href="{{ route('home') }}">
                  <img id="DGH-Logo" src="{{ asset($sitesettings->logo) }}" alt="Logo" draggable="false" height="110" />
              </a>
              <div class="Book-an-appointment d-none d-md-block">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="appointment-button btn btn-primary" id="appointment" href="{{ route('appointment.create') }}">Book an Appointment</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
    </section>
    @include('partials.navbar')
  </header>
  