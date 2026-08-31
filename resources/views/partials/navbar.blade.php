<section class="menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <!-- Navbar Toggler for smaller screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuCollapse"
                aria-controls="menuCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-center" id="menuCollapse">
            <ul class="navbar-nav gap-3">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item {{ Request::is('departments') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('departments') }}">Departments</a>
                </li>
                <li class="nav-item {{ Request::is('doctors') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('doctors') }}">Our Doctors</a>
                </li>
                <li class="nav-item {{ Request::is('packages') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('packages') }}">Packages</a>
                </li>
                <li class="nav-item {{ Request::is('teams') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('teams') }}">Our Team</a>
                </li>
                <li class="nav-item {{ Request::is('contact/create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact.create') }}">Contact Us</a>
                </li>
                <!-- Online Appointment option for smaller screens -->
                <li class="nav-item d-lg-none {{ Request::is('appointment/create') ? 'active' : '' }}">
                    <a class="nav-link btn btn-primary" href="{{ route('appointment.create') }}">Online Appointment</a>
                </li>
            </ul>
        </div>
      </div>
    </nav>
  </section>
  