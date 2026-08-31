<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Department;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index(){
        $teams = team::all();
        return view('team.index',['teams' => $teams]);
    }

    public function create(){
        return view('team.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|mimes:png,jpg,svg',
            'description' => 'nullable',
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/team/';
            $file -> move($path ,$filename);
        }

        $newTeam = Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $path.$filename,
            'description' => $request->description,
        ]);

        return redirect(route('team.index'));
    }

    public function edit(Team $team){
        return view('team.edit', ['team' => $team]);
    }
    
    public function update(Team $team, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|mimes:png,jpg,svg',
            'description' => 'nullable',
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/team/';
            $file->move($path, $filename);
    
            if (File::exists($team->image)) {
                File::delete($team->image);
            }
    
            $team->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'image' => $path.$filename,
                'description' => $request->description,
            ]);
        } else {
            $team->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
            ]);
        }
    
        return redirect(route('team.index'))->with('success', 'Team updated successfully');
    }

    public function delete(Team $team){
        if(File::exists($team->image)){
            File::delete($team->image);
        }
        $team->delete();
        return redirect(route('team.index'))->with('success','Team deleted successfully');
    }
    

}
