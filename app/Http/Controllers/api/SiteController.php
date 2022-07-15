<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /*
    *   LIST ALL SITES
    */
    public function index(){
        $sites = Site::all();

        return response()->json([
            'status' => true,
            'data' => $sites
        ]);
    }

    /*
    *   DISPLAY ONE SITE
    */
    public function show($id){
        $project  = Site::find($id);

        if ($project) {
             return response()->json([
            'status' => true,
            'data' => $project
            ]);
        }
        else {
            return response()->json([
                'message' => "no data",
            ], 404);
        }

        
    }


    /*
    *   CREATE A NEW SITE
    */
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'site_code' => 'required|min:3|unique:sites',
            'project' => 'required',
            'trees' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'message' => 'Error Adding Site, Try Again',
                'errors' => $errors,
            ]);
        }

        if ($validator->passes()) {
            $site = Site::create([
                'name' => $request->name,
                'site_code' => $request->site_code,
                'project' => $request->project,
                'trees' => $request->trees,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'New Site Added',
                'site' => $site
            ], 200);
        }
               
    }

    /*
    *   DELETE A SITE
    */
    public function update(Request $request, Site $site){
        $site->update($request->all());

        return response()->json([
            'status' =>true,
            'message' => 'Site Updated Successfully',
            'site' => $site
        ], 200);
    }
}