<?php
namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Testimonial;
use App\Models\Package;
use App\Models\Team;
use App\Models\Slider;
use App\Models\Information;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $sitesettings = SiteSetting::first();
        $departments = Department::all();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $informations = Information::first();
        return view('home', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders', 'informations'));
    }

    public function teams(){
        $sitesettings = SiteSetting::first();
        $departments = Department::all();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $teams = Team::all();
        $informations = Information::first();
        return view('team', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders','teams', 'informations'));
    }

    public function about(){
        $sitesettings = SiteSetting::first();
        $departments = Department::all();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $informations = Information::first();
        return view('about', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders', 'informations'));
    }

    public function departments(){
        $sitesettings = SiteSetting::first();
        $departments = Department::paginate(4);
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $informations = Information::first();
        return view('departmentsite', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders', 'informations'));
    }

    public function doctors(){
        $sitesettings = SiteSetting::first();
        $departments = Department::all();
        $doctors = Doctor::paginate(8);
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $informations = Information::first();
        return view('doctorsite', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders', 'informations'));
    }

    public function packages(){
        $sitesettings = SiteSetting::first();
        $departments = Department::all();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $informations = Information::first();
        return view('packagesite', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders', 'informations'));
    }
}
