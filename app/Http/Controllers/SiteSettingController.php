<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\File;


class SiteSettingController extends Controller
{
    public function index(){
        $sitesettings = sitesetting::all();
        return view('sitesetting.index',['sitesettings' => $sitesettings]);
    }

    public function getSiteSetting(){
        $sitesettings = sitesetting::first();
        return view('home',['sitesettings' => $sitesettings]);
    }

    public function create(){
        return view('sitesetting.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'logo' => 'required|mimes:png,jpg,svg',
            'name' => 'required',
            'address' => 'required',
            'email1' => 'nullable',
            'email2' => 'nullable',
            'phone_number1' => 'nullable',
            'phone_number2' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,svg',
            'link1' => 'nullable',
            'link2' => 'nullable',
            'link3' => 'nullable',
        ]);
        if($request->has('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();

            $filename_logo = time().'1.'.$extension;

            $path_logo = 'uploads/sitesetting/';
            $file -> move($path_logo ,$filename_logo);
        }

        if($request->has('image')){

            $file1 = $request->file('image');
            $extension1 = $file1->getClientOriginalExtension();

            $filename_image = time().'.'.$extension1;

            $path_image = 'uploads/sitesetting/';
            $file1 -> move($path_image ,$filename_image);
            $newsitesetting = sitesetting::create([
                'logo'=>$path_logo.$filename_logo,
                'name'=> $request->name,
                'address' => $request->address,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'phone_number1' => $request->phone_number1,
                'phone_number2' => $request->phone_number2,
                'image' => $path_image.$filename_image,
                'link1' => $request->link1,
                'link2' => $request->link2,
                'link3' => $request->link3,
            ]);
        }
        else{
            $newsitesetting = sitesetting::create([
            'logo'=>$path_logo.$filename_logo,
            'name'=> $request->name,
            'address' => $request->address,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'phone_number1' => $request->phone_number1,
            'phone_number2' => $request->phone_number2,
            'link1' => $request->link1,
            'link2' => $request->link2,
            'link3' => $request->link3,
            ]);

        }

        

        return redirect(route('sitesetting.index'));
    }

    public function edit(SiteSetting $sitesetting){
        return view('sitesetting.edit', ['sitesetting' => $sitesetting]);
    }
    
    public function update(SiteSetting $sitesetting, Request $request){
        $data = $request->validate([
            'logo' => 'required|mimes:png,jpg,svg',
            'name' => 'required',
            'address' => 'required',
            'email1' => 'nullable',
            'email2' => 'nullable',
            'phone_number1' => 'nullable',
            'phone_number2' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,svg',
            'link1' => 'nullable',
            'link2' => 'nullable',
            'link3' => 'nullable',
        ]);
        
        if($request->has('image')){
            $file1 = $request->file('image');
            $extension1 = $file1->getClientOriginalExtension();
            $filename1 = time().'.'.$extension1;
            $path_image = 'uploads/sitesetting/';
            $file1 -> move($path_image ,$filename1);

            $file2 = $request->file('logo');
            $extension2 = $file2->getClientOriginalExtension();
            $filename2 = time().'1.'.$extension2;
            $path_logo = 'uploads/sitesetting/';
            $file2 -> move($path_logo ,$filename2);

            if(File::exists($sitesetting->image)){
                File::delete($sitesetting->image);
                File::delete($sitesetting->logo);
            }
            $sitesetting->update([
                'logo'=>$path_logo.$filename2,
                'name'=> $request->name,
                'address' => $request->address,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'phone_number1' => $request->phone_number1,
                'phone_number2' => $request->phone_number2,
                'image' =>$path_image.$filename1,
                'link1' => $request->link1,
                'link2' => $request->link2,
                'link3' => $request->link3,
            ]);
        } else {
            $file2 = $request->file('logo');
            $extension2 = $file2->getClientOriginalExtension();
            $filename2 = time().'1.'.$extension2;
            $path_logo = 'uploads/sitesetting/';
            $file2 -> move($path_logo ,$filename2);
            File::delete($sitesetting->logo);
            $sitesetting->update([
                'logo'=> $path_logo.$filename2,
                'name'=> $request->name,
                'address' => $request->address,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'phone_number1' => $request->phone_number1,
                'phone_number2' => $request->phone_number2,
                'link1' => $request->link1,
                'link2' => $request->link2,
                'link3' => $request->link3,
            ]);
        }
        return redirect(route('sitesetting.index'))->with('success','Site settings updated successfully');
    }

    public function delete(SiteSetting $sitesetting){ 
        if(File::exists($sitesetting->logo)){
            try {
                File::delete($sitesetting->logo);
            } catch (\Exception $e) {
                // Log error or handle it as needed
                \Log::error('Error deleting logo file: ' . $e->getMessage());
            }
        }
        if(File::exists($sitesetting->image)){
            try {
                File::delete($sitesetting->image);
            } catch (\Exception $e) {
                // Log error or handle it as needed
                \Log::error('Error deleting image file: ' . $e->getMessage());
            }
        }
        $sitesetting->delete();
        return redirect(route('sitesetting.index'))->with('success','Site settings deleted successfully');
    }
}    
