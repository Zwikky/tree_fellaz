<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class Projects extends Controller
{
    public function view_projects(){
        $projects = Project::all();

        return view('admin.projects', ['projects'=>$projects]);
    }

    public function add_project(Request $request){
        $this->validate($request, [
            'title'=>'required|min:3',
            'status' => 'required'
        ]);

        $project = Project::create($request->all());

        if ($project) {
            return back()->with('success', 'New Project Added Successfully.');
        } else {
            return back()->with('error', 'Error Creating Project.');
            
        }
    }
}