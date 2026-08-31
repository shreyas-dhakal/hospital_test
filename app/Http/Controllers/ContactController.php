<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Contact;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\Information;
use App\Models\Package;
use App\Models\Slider;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);

        return view('contact.index', ['contacts' => $contacts]);
    }

    public function create()
    {   $sitesettings = SiteSetting::first();
        $departments = Department::all();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $informations = Information::first();
        return view('contact.create', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders','informations'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:255'
        ]);

        $newContact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message']
        ]);
    


        $sitesettings = SiteSetting::first();
        $departments = Department::all();
        $doctors = Doctor::all();
        $testimonials = Testimonial::all();
        $packages = Package::all();
        $sliders = Slider::all();
        $informations = Information::first();
        return view('contact.finish', compact('sitesettings', 'departments', 'doctors', 'testimonials', 'packages', 'sliders', 'informations'));

    }

    public function archive($id)
    {
        $contact = Contact::findOrFail($id);
        $createdAt = Carbon::parse($contact->created_at)->toDateTimeString();
        unset($contact['created_at']);
        unset($contact['updated_at']);
        $contactData = $contact->toArray();
    
        DB::table('old_contacts')->insert(array_merge($contactData, ['contact_date' => $createdAt]));

        $contact->delete();
        
        return redirect()->back()->with('success', 'Contact archived successfully.');
    }
}
