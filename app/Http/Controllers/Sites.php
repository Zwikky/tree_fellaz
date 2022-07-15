<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Site;
use Illuminate\Http\Request;

class Sites extends Controller
{
    public function view_sites(){
        $sites = Site::all();

        $projects = Project::all();

        return view('admin.sites', [
            'sites' => $sites, 
            'projects' => $projects
        ]);
    }

    public function add_site(Request $request){
        $this->validate($request, [
            'name'=>'required|min:3',
            'code'=>'required|unique:sites,site_code',
            'project'=>'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'trees' => 'required'
        ]);

        $site = Site::create([
            'name' => $request->name,
            'site_code' => $request->code,
            'project' => $request->project,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'trees' => $request->trees
        ]);

        if ($site) {
            return back()->with(['success'=>'New Site Created Successfully']);
        }else {
            return back()->with(['error'=>'Error Creating Site, Try Again']);
        }
    }
}