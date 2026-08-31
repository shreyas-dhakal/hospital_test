<div class="wrapper">
    <aside id="sidebar" class="fixed-sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <x-application-logo />
            </button>
            <div class="sidebar-logo">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="{{ route('department.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-house-medical"></i>
                    <span>Departments</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('doctor.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Doctors</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('package.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-rectangle-list"></i>
                    <span>Packages</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('slider.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-sliders"></i>
                    <span>Sliders Info</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('testimonial.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-users-gear"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('sitesetting.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-gear"></i>
                    <span>Site Settings</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('appointment.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('contact.index') }}" class="sidebar-link">
                    <i class="fa-regular fa-address-book"></i>
                    <span>Contacts</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('team.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-people-group"></i>
                    <span>Teams</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('information.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Information</span>
                </a>
            </li>
            <li><a href="{{ route('user.index') }}" class="sidebar-link">
                <i class="fa-solid fa-user"></i>
                <span>Users</span>
            </a></li></ul>
            <div class="sidebar-footer">
                <a href="{{ url('/logout') }}" class="sidebar-link">
                    <i class="fa-solid fa-sign-out"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>

    </aside>
    <div class="main p-3">
        <div class="text-center">
            <h1>
            </h1>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="script.js"></script>