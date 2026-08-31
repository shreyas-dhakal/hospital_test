@extends('master')

@section('title', 'Dirghayu Hospital: Best Hospital in Kathmandu | Dirghayu Guru Hospital')
@section('meta_description', 'Dirghayu Guru Hospital, one of the best hospital in Kathmandu, is among the best neuro hospital in Kathmandu. Dirghayu aims to be the top hospital in Kathmandu.')
@section('keywords', 'Dirghayu, Dirghayu Guru Hospital, Dirghayu Guru, Dirghayu Hospital, Dirghayu Chabahil, Hospital Dirghayu, Hospital in Nepal, Hospital in Kathmandu, Neuro in Kathmandu, Neurosurgery, Dirghayu in Nepal, Best Hospital in Nepal, Best Neuro Hospital in Kathmandu, Leading Hospital in Nepal, Top Hospital in Nepal, Doctors in Kathmandu, Kathmandu Hospital, Hospital Contact, Best Hospital in Kathmandu, Online Appointment, Best Neuro hospital, Neuro in Kathmandu')


@section('content')
<section class="doctors py-5">
    <div class="container">
      <h2 class="our-stories text-center pb-5">
        Our <span class="green-text">Team</span>
      </h2>
      <div class="row">
        @foreach ($teams as $team)
        <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start mt-4">
              <div class="pic">
                <img src="{{asset($team->image)}}"  alt="" />
              </div>
              <div class="member-info">
                <h4>{{$team->name}}</h4>
                <span>{{$team->designation}}</span>
                <p>
                  {{$team->description}}
                </p>
              </div>
            </div>
          </div>
            
        @endforeach
      </div>
    </div>
  </section>

@endsection