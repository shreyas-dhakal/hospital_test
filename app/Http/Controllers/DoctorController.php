<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorAvailiblity;
use App\Models\Department;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    public function index(){
        $doctors = Doctor::with('department')->paginate(4); // Eager load department relationship
        return view('doctor.index',['doctors' => $doctors]);
        
    }

    public function create(){
        $departments = Department::all(); // Fetch all departments for the dropdown
        return view('doctor.create', ['departments' => $departments]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|mimes:png,jpg,svg',
            'description' => 'nullable',
            'nmc_reg' => 'required',
            'department_id' => 'required',
            'availabilities' => 'required|array',
            'availabilities.*.day' => 'required|string',
            'availabilities.*.start_time' => 'required|date_format:H:i',
            'availabilities.*.end_time' => 'nullable|date_format:H:i|after:availabilities.*.start_time',
        ]);
    
        $path = null;
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/doctor/';
            $file->move($path, $filename);
        }
    
        $newDoctor = Doctor::create([
            'name' => $data['name'],
            'designation' => $data['designation'],
            'image' => $path ? $path . $filename : null,
            'description' => $data['description'],
            'nmc_reg' => $data['nmc_reg'],
            'department_id' => $data['department_id']
        ]);
    
        foreach ($data['availabilities'] as $availability) {
            $newDoctor->availabilities()->create($availability);
        }
    
        return redirect(route('doctor.index'));
    }
    

    public function edit(Doctor $doctor){
        $departments = Department::all(); // Fetch all departments for the dropdown
        return view('doctor.edit', ['doctor' => $doctor, 'departments' => $departments]);
    }
    
    public function update(Doctor $doctor, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|mimes:png,jpg,svg',
            'description' => 'nullable',
            'nmc_reg' => 'required',
            'department_id' => 'required',
            'availabilities' => 'required|array',
            'availabilities.*.day' => 'required|string',
            'availabilities.*.start_time' => 'required|date_format:H:i',
            'availabilities.*.end_time' => 'nullable|date_format:H:i|after:availabilities.*.start_time',
        ]);
    
        if ($request->has('image')) {
            if (File::exists($doctor->image)) {
                File::delete($doctor->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/doctor/';
            $file->move($path, $filename);
    
            $doctor->update([
                'name' => $data['name'],
                'designation' => $data['designation'],
                'image' => $path . $filename,
                'description' => $data['description'],
                'nmc_reg' => $data['nmc_reg'],
                'department_id' => $data['department_id']
            ]);
        } else {
            $doctor->update([
                'name' => $data['name'],
                'designation' => $data['designation'],
                'description' => $data['description'],
                'nmc_reg' => $data['nmc_reg'],
                'department_id' => $data['department_id']
            ]);
        }
    
        $doctor->availabilities()->delete();
        foreach ($data['availabilities'] as $availability) {
            $doctor->availabilities()->create($availability);
        }
    
        return redirect(route('doctor.index'))->with('success', 'Doctor updated successfully');
    }
    

    public function delete(Doctor $doctor){
        if(File::exists($doctor->image)){
            File::delete($doctor->image);
        }
        $doctor->delete();
        return redirect(route('doctor.index'))->with('success','Doctor deleted successfully');
    }
    
    public function getDoctorsByDepartment($departmentId)
    {
        $doctors = Doctor::where('department_id', $departmentId)->get();
        return response()->json($doctors);
    }
}
