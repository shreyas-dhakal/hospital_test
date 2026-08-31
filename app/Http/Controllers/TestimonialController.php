<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = testimonial::all();
        return view('testimonial.index',['testimonials' => $testimonials]);
        
    }

    public function create(){
        return view('testimonial.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'designation' => 'required',
            'image' => 'nullable|mimes:png,jpg,svg'
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/testimonial/';
            $file -> move($path ,$filename);
        }

        $newTestimonial = Testimonial::create([
            'title' => $request->title,
            'description' => $request->description,
            'designation' => $request->designation,
            'image' => $path.$filename
        ]);


        return redirect(route('testimonial.index'));
    }

    public function edit(Testimonial $testimonial){
        return view('testimonial.edit', ['testimonial' => $testimonial]);
    }
    
    public function update(Testimonial $testimonial, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'designation' => 'required',
            'image' => 'nullable|mimes:png,jpg,svg'
        ]);
        
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/testimonial/';
            $file->move($path, $filename);
    
            if(File::exists($testimonial->image)){
                File::delete($testimonial->image);
            }
            $testimonial->update([
                'title' => $request->title,
                'description' => $request->description,
                'designation' => $request->designation,
                'image' => $path.$filename
            ]);
        } else {
            $testimonial->update([
                'title' => $request->title,
                'description' => $request->description,
                'designation' => $request->designation
            ]);
        }
        return redirect(route('testimonial.index'))->with('success','Testimonial updated successfully');
    }

    public function delete(Testimonial $testimonial){
        if(File::exists($testimonial->image)){
            File::delete($testimonial->image);
        }
        $testimonial->delete();
        return redirect(route('testimonial.index'))->with('success','Testimonial deleted successfully');
    }
}
