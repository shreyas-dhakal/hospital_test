@extends('master')

@section('title', 'Dirghayu Hospital: Best Hospital in Kathmandu | Dirghayu Guru Hospital')
@section('meta_description', 'Dirghayu Guru Hospital, one of the best hospital in Kathmandu, is among the best neuro hospital in Kathmandu. Dirghayu aims to be the top hospital in Kathmandu.')
@section('keywords', 'Dirghayu, Dirghayu Guru Hospital, Dirghayu Guru, Dirghayu Hospital, Dirghayu Chabahil, Hospital Dirghayu, Hospital in Nepal, Hospital in Kathmandu, Neuro in Kathmandu, Neurosurgery, Dirghayu in Nepal, Best Hospital in Nepal, Best Neuro Hospital in Kathmandu, Leading Hospital in Nepal, Top Hospital in Nepal, Doctors in Kathmandu, Kathmandu Hospital, Hospital Contact, Best Hospital in Kathmandu, Online Appointment, Best Neuro hospital, Neuro in Kathmandu')

@section('content')
<section class="about-section">
    <div class="container text-center my-5">
        <h2>
            Our <span class="green-text">Vision</span>
        </h2>
        <div class="row d-flex justify-content-between align-items-center mt-5 mb-0">
            <div class="col-md-5 order-md-1 order-1">
                <img src="{{ asset($informations->vision_image) }}" class="about-image rounded-5 my-3" alt="Vision Image">
            </div>
            <div class="col-md-7 order-md-2 order-2">
                <p class="our-vision text-start mx-3 my-2" style="line-height: 1.6">
                    {{ $informations->vision }}
                </p>
            </div>
        </div>
    </div>

    <div class="container text-center my-5">
        <h2>
            Chairman's <span class="green-text">Greeting</span>
        </h2>
        <div class="row d-flex justify-content-between align-items-center mt-5 mb-0">
            <div class="col-md-7 order-md-1 order-2">
                <p class="our-vision text-start mx-3 my-2" style="line-height: 1.6">
                    {{ $informations->greeting }}
                </p>
            </div>
            <div class="col-md-5 order-md-2 order-1">
                <img src="{{ asset($informations->greeting_image) }}" class="about-image rounded-5 my-3" alt="Greeting Image">
            </div>
        </div>
    </div>

    <div class="container text-center my-5">
        <h2>
            Patron's <span class="green-text">Note</span>
        </h2>
        <div class="row d-flex justify-content-between align-items-center mt-5 mb-0">
            <div class="col-md-5 order-md-1 order-1">
                <img src="{{ asset($informations->message_image) }}" class="about-image rounded-5 my-3" alt="Message Image">
            </div>
            <div class="col-md-7 order-md-2 order-2">
                <p class="our-vision text-start mx-3 my-2" style="line-height: 1.6">
                    {{ $informations->message }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
