@extends('master')

@section('title', 'Dirghayu Hospital: Best Hospital in Kathmandu | Dirghayu Guru Hospital')
@section('meta_description', 'Dirghayu Guru Hospital, one of the best hospital in Kathmandu, is among the best neuro hospital in Kathmandu. Dirghayu aims to be the top hospital in Kathmandu.')
@section('keywords', 'Dirghayu, Dirghayu Guru Hospital, Dirghayu Guru, Dirghayu Hospital, Dirghayu Chabahil, Hospital Dirghayu, Hospital in Nepal, Hospital in Kathmandu, Neuro in Kathmandu, Neurosurgery, Dirghayu in Nepal, Best Hospital in Nepal, Best Neuro Hospital in Kathmandu, Leading Hospital in Nepal, Top Hospital in Nepal, Doctors in Kathmandu, Kathmandu Hospital, Hospital Contact, Best Hospital in Kathmandu, Online Appointment, Best Neuro hospital, Neuro in Kathmandu')

@section('content')

<!-- Announcement Popup -->
@if (file_exists(public_path('images/announcement.jpg')))
<div id="customAnnouncement" style="
    display: none; 
    position: fixed; 
    top: 50%; 
    left: 50%; 
    transform: translate(-50%, -50%); 
    background: white; 
    padding: 25px; 
    border-radius: 10px; 
    text-align: center; 
    z-index: 1000; 
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.3); 
    max-width: 500px; 
    width: 85%;">

    <span onclick="closePopup()" style="
        position: absolute; 
        top: 15px; 
        right: 20px; 
        color: black; 
        font-size: 28px; 
        font-weight: bold; 
        cursor: pointer;">&times;</span>

    <!-- Announcement Image -->
    <img src="{{ asset('images/announcement.jpg') }}" style="
        max-width: 100%; 
        height: auto; 
        display: block; 
        border-radius: 10px; 
        margin-bottom: 10px;" 
        alt="Announcement">

    <p style="font-size: 16px; font-weight: bold;">Welcome to Dirghayu Hospital! Check out our latest updates and services.</p>
</div>
@endif

<div class="swiper-container mySwiper">
  <div class="swiper-wrapper">
    @foreach ($sliders->take(3) as $slider) {{-- Take only the first 3 sliders --}}
    <div class="swiper-slide">
      <div class="swiper-slide-overlay swiperClass">
        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" class="slider-image" />
        <div class="container">
          <div class="overlay-text d-flex flex-column flex-lg-row align-items-lg-center">
            <div class="line d-none d-lg-block"></div>
            <div class="message py-4">
              <h1 class="large-text text-center text-lg-start">{{ $slider->description }}</h1>
              <!-- Navigation buttons -->
              <div class="navigation-buttons mt-3 d-flex d-none d-lg-flex">
                <div class="swiper-button-prev me-2"></div>
                <div class="swiper-button-next ms-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<section class="about-us pt-5">
  <div class="container">
      <h2 class="our-stories text-center pb-4 pb-md-5">
          Our <span class="green-text">Stories</span>
      </h2>
      <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0 text-center text-md-start">
              <div class="about-body">
                  <p class="first-paragraph" style="line-height: 1.6; text-align: center;">
                      {{ $informations->story1 }}
                  </p>
                  <p class="first-paragraph" style="line-height: 1.6; text-align: center;">
                      {{ $informations->story2 }}
                  </p>
              </div>
              <div class="d-flex justify-content-center">
                  <a class="about-button btn btn-primary mt-4 mb-4" href="{{ route('about') }}">Know More</a>
              </div>
          </div>
          <div class="col-lg-6 d-none d-lg-block">
              <div class="about-image text-center">
                  <img src="{{ asset($informations->story_image) }}" alt="About Us Image" />
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Department -->
<section class="Departments-home py-5">
    <div class="container">
        <h2 class="our-stories text-center pb-5">
            Our <span class="green-text">Departments</span>
        </h2>
        <div class="row text-center my-3">
            @foreach ($departments->slice(0, 4) as $department)
                <div class="col-sm-6 col-md-3 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <a href="{{ route('department.doctors', $department->id) }}" class="department-link">
                            <div class="circle d-flex justify-content-center align-items-center mb-4">
                                <img class="depart-image" src="{{ asset($department->image) }}"
                                    alt="{{ $department->name }}" />
                            </div>
                            <div class="depart-name text-center mt-2">{{ $department->name }}</div>
                        </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="department-end col-auto">
            <a href="{{ route('departments') }}" class="depart-button btn btn-primary mt-5">Explore All</a>
        </div>
    </div>
</section>

<!-- Our Doctors -->
<section class="doctors py-5">
    <div class="container">
        <h2 class="our-stories text-center pb-5">
            Our <span class="green-text">Doctors</span>
        </h2>
        <div class="row">
            @foreach ($doctors->slice(0, 4) as $doctor)
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex align-items-start p-3 bg-white shadow-sm rounded">
                        <div class="pic">
                            <img src="{{ $doctor->image }}" class="img-fluid rounded-circle"
                                alt="{{ $doctor->name }}" />
                        </div>
                        <div class="member-info ml-3">
                            <h4>{{ $doctor->name }}</h4>
                            <span>{{ $doctor->designation }}</span>
                            <p>{{ $doctor->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-sm-6 text-center">
                <a href="{{ route('doctors') }}" class="doctors-button btn btn-primary mt-5">Explore All</a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials swiper">
    <div class="container">
        <h2 class="our-stories text-center pb-5">
            Client <span class="green-text">Testimonials</span>
        </h2>
        <swiper-container class="swiper-container mySwiperTestimonial" pagination="true" effect="coverflow"
            grab-cursor="true" centered-slides="true" :slides-per-view="1" :space-between="30"
            breakpoints='{
            "640": {
                "slidesPerView": 1,
                "spaceBetween": 20
            },
            "768": {
                "slidesPerView": 2,
                "spaceBetween": 30
            },
            "1024": {
                "slidesPerView": 3,
                "spaceBetween": 40
            }
        }'
            coverflow-effect-rotate="3" coverflow-effect-stretch="3" coverflow-effect-depth="100"
            coverflow-effect-modifier="3" coverflow-effect-slide-shadows="true" initial-slide="1">
            @foreach ($testimonials as $testimonial)
                <swiper-slide class="mb-5">
                    <div class="testimonial-wrap text-center p-3">
                        <div class="testimonial-item">
                            <img src="{{ asset($testimonial->image) }}" class="testimonial-img rounded-circle my-3"
                                alt="{{ $testimonial->title }}" />
                            <p>
                                {{ $testimonial->description }}
                            </p>
                            <h3 class="pt-3">{{ $testimonial->title }}</h3>
                            <h5 class="pb-3">{{ $testimonial->designation }}</h5>
                        </div>
                    </div>
                </swiper-slide>
            @endforeach
        </swiper-container>
    </div>
</section>

<!-- Our Packages -->
<section class="packages py-5">
    <div class="container">
        <h2 class="our-stories text-center pb-5">
            Our <span class="green-text">Packages</span>
        </h2>
        <div class="container my-3">
            <div class="row mx-auto my-auto">
                @foreach ($packages->slice(0, 3) as $package)
                    <div class="col-sm-4 mb-4">
                        <div class="card packages-card">
                            <div class="card-body">
                                <h4 class="package-title text-center mt-3 mb-5">
                                    {{ $package->title }}
                                </h4>
                                <p class="package-desc px-4">
                                    {{ $package->description }}
                                </p>
                                <p class="py-3">
                                    <span class="font-weight-bold"> The Package Includes:</span>
                                </p>
                                <div class="package-list">
                                    <ul class="list-unstyled mb-5">
                                        @for ($i = 1; $i <= 25; $i++)
                                            @if (!empty($package->{'field_' . $i}))
                                                <li class="mb-3">
                                                    <i class="fas fa-check-circle text-success me-2"></i> 
                                                    {{ $package->{'field_' . $i} }}
                                                </li>
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                                <div class="package-price align-items-center text-center mb-3 mx-auto p-3">
                                    Rs. {{ $package->price }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 text-center">
                <a href="{{ route('packages') }}" class="package-button btn btn-primary mt-5">Explore All</a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if (file_exists(public_path('images/announcement.jpg')))
            document.getElementById("customAnnouncement").style.display = "block";
        @endif
    });

    function closePopup() {
        document.getElementById("customAnnouncement").style.display = "none";
    }
</script>

@endsection
