@extends('master')
@section('navbar')
<section class="menu">
    <nav class="navbar navbar-expand-md">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuCollapse"
          aria-controls="menuCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="menuCollapse">
          <ul class="navbar-nav gap-5">
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('departments')}}">Departments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('doctors')}}">Our Doctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('packages')}}">Packages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('teams')}}">Our Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact.create')}}">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
@endsection('navbar')
@section('content')

<div style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
    <p style="font-size: 20px; color: #333;">Thank you for reaching out to us.</p>
    <p style="font-size: 16px; color: #555;">We will reach back to you shortly.</p>
</div>
 
@endsection