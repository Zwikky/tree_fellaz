<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /*
    *   DISPLAY ALL PROJECTS
    */
    public function index(){
        $projects  = Project::all();

        return response()->json([
            'status' => true,
            'data' => $projects
        ]); 
    }

    /*
    *   DISPLAY ONE PROJECT
    */
    public function show($id){
        $project  = Project::where('id', $id)->get();

        return response()->json([
            'status' => true,
            'data' => $project
        ]); 
    }

    /*
    *   CREATE NEW PROJECT
    */
    public function store(Request $request){

        
        $validator = Validator::make($request->all(),[
            'title'=>'required|max:150|unique:projects',
            'status'=>['required', Rule::in(['completed', 'in-progress', 'abandoned', 'not-started'])]
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'message' => 'Error creating project, try again',
                'errors' => $errors
            ], 403);
        }

        if ($validator->passes()) {
            $project = Project::create([
                'title' => $request->title,
                'status' => $request->status
            ]);
            
            return response()->json([
                'status' => true,
                'message' => "Project Created Successfully",
                'project' => $project
            ], 200);
        }

        
    }

    /*
    *   UPDATE A PROJECT
    */
    public function update(Request $request, Project $project){
        $project->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Project Updated Successfully',
            'project' => $project
        ], 200);
    }

    /*
    *   DELETE A PROJECT
    */
    public function destroy(Project $project){
        $project->delete();

        return response()->json([
            'status' => true,
            'message' => 'Project Deleted Successfully'
        ], 200);
    }

}