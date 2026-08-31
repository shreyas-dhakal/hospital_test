@extends('master')

@section('title', 'Dirghayu Hospital: Best Hospital in Kathmandu | Dirghayu Guru Hospital')
@section('meta_description', 'Dirghayu Guru Hospital, one of the best hospital in Kathmandu, is among the best neuro hospital in Kathmandu. Dirghayu aims to be the top hospital in Kathmandu.')
@section('keywords', 'Dirghayu, Dirghayu Guru Hospital, Dirghayu Guru, Dirghayu Hospital, Dirghayu Chabahil, Hospital Dirghayu, Hospital in Nepal, Hospital in Kathmandu, Neuro in Kathmandu, Neurosurgery, Dirghayu in Nepal, Best Hospital in Nepal, Best Neuro Hospital in Kathmandu, Leading Hospital in Nepal, Top Hospital in Nepal, Doctors in Kathmandu, Kathmandu Hospital, Hospital Contact, Best Hospital in Kathmandu, Online Appointment, Best Neuro hospital, Neuro in Kathmandu')


@section('content')
<section class="packages py-5">
  <div class="container">
      <h2 class="our-stories text-center pb-5">
          Our <span class="green-text">Packages</span>
      </h2>
      <div class="container my-3">
          <div class="row mx-auto my-auto">
              @foreach ($packages as $package)
                  <div class="col-md-4 mb-4">
                        <div class="card packages-card mx-auto"> 
                          <div class="card-body">
                              <h4 class="package-title text-center mt-3 mb-5">
                                  {{ $package->title }}
                              </h4>
                              <p class="package-desc px-4 text-center">
                                  {{ $package->description }}
                              </p>
                              <p class="py-3">
                                  The Package Includes:
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
  </div>
</section>
@endsection
