<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();
        return view('package.index', ['packages' => $packages]);
    }

    public function create(){
        return view('package.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'field_1' => 'nullable',
            'field_2' => 'nullable',
            'field_3' => 'nullable',
            'field_4' => 'nullable',
            'field_5' => 'nullable',
            'field_6' => 'nullable',
            'field_7' => 'nullable',
            'field_8' => 'nullable',
            'field_9' => 'nullable',
            'field_10' => 'nullable',
            'field_11' => 'nullable',
            'field_12' => 'nullable',
            'field_13' => 'nullable',
            'field_14' => 'nullable',
            'field_15' => 'nullable',
            'field_16' => 'nullable',
            'field_17' => 'nullable',
            'field_18' => 'nullable',
            'field_19' => 'nullable',
            'field_20' => 'nullable',
            'field_21' => 'nullable',
            'field_22' => 'nullable',
            'field_23' => 'nullable',
            'field_24' => 'nullable',
            'field_25' => 'nullable',
        ]);

        $newPackage = Package::create($data);
        return redirect(route('package.index'));
    }

    public function edit(Package $package){
        return view('package.edit', ['package' => $package]);
    }

    public function update(Package $package, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'field_1' => 'nullable',
            'field_2' => 'nullable',
            'field_3' => 'nullable',
            'field_4' => 'nullable',
            'field_5' => 'nullable',
            'field_6' => 'nullable',
            'field_7' => 'nullable',
            'field_8' => 'nullable',
            'field_9' => 'nullable',
            'field_10' => 'nullable',
            'field_11' => 'nullable',
            'field_12' => 'nullable',
            'field_13' => 'nullable',
            'field_14' => 'nullable',
            'field_15' => 'nullable',
            'field_16' => 'nullable',
            'field_17' => 'nullable',
            'field_18' => 'nullable',
            'field_19' => 'nullable',
            'field_20' => 'nullable',
            'field_21' => 'nullable',
            'field_22' => 'nullable',
            'field_23' => 'nullable',
            'field_24' => 'nullable',
            'field_25' => 'nullable',
        ]);

        $package->update($data);
        return redirect(route('package.index'))->with('success', 'Package updated successfully');
    }

    public function delete(Package $package){
        $package->delete();
        return redirect(route('package.index'))->with('success', 'Package deleted successfully');
    }
}
