<footer id="footer">
  <div class="footer-top">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-6 footer-contact mb-md-0 mb-4">
                  <a href="index.html">
                      <img src="{{ asset($informations->logo) }}" height="90" alt="logo">
                  </a>
                  <h3>{{ $informations->name }}</h3>
                  <p class="mt-3">{{ $informations->footer }}</p>
              </div>
              <div class="col-lg-4 col-md-6 footer-links mb-md-0 mb-4">
                  <h4>Quick Links</h4>
                  <ul>
                      <li><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                      <li><a href="{{ route('about') }}" class="text-decoration-none">About us</a></li>
                      <li><a href="{{ route('departments') }}" class="text-decoration-none">Departments</a></li>
                      <li><a href="{{ route('doctors') }}" class="text-decoration-none">Doctors</a></li>
                      <li><a href="{{ route('packages') }}" class="text-decoration-none">Packages</a></li>
                      <li><a href="{{ route('appointment.create') }}" class="text-decoration-none">Book an Appointment</a></li>
                  </ul>
              </div>
              <div class="col-lg-4 col-md-6 footer-links">
                  <h4>Our Services</h4>
                  <ul class="list-unstyled">
                      <li><i class="fas fa-map-marker-alt mx-2"></i>{{ $sitesettings->address }}</li>
                      <li><i class="fas fa-envelope-open-text mx-2"></i>{{ $sitesettings->email1 }}</li>
                      <li><i class="fas fa-mobile-alt mx-2"></i>{{ $sitesettings->phone_number1 }}</li>
                      <li><i class="fas fa-phone-alt mx-2"></i>{{ $sitesettings->phone_number2 }}</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <div class="footer-bottom">
      <div class="container">
          <div class="row">
              <div class="col-12 text-center">
                  <p>&copy; Copyright Dirghayu Hospital {{ date('Y') }} <strong>{{ $informations->name }}</strong>. All Rights Reserved | Developed by Code Craft Web Solution</p>
              </div>
          </div>
      </div>
  </div>
</footer>
