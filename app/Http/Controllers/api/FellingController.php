<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Felling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FellingController extends Controller
{
    
    /*
    *   DISPLAY ALL PROJECTS
    */
    public function index(){
        $felling  = Felling::all();

        return response()->json([
            'status' => true,
            'data' => $felling
        ]); 
    }
    
    /*
    *   CREATE NEW PROJECT
    */
    public function store(Request $request){

        
        $validator = Validator::make($request->all(),[
            'number_of_trees'=>'required',
            'site'=>'required',
            'photo'=>'required',
            'captured_by'=>'required',            
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'message' => 'Error creating felling, try again',
                'errors' => $errors
            ], 403);
        }

        if ($validator->passes()) {

            $image = $request->photo;  // your base64 encoded
            $ext = explode(';base64',$image);
            $ext = explode('/',$ext[0]);			
            $ext = $ext[1];
            $image = str_replace('data:image/'.$ext.';base64,', '', $image);
            $image = str_replace(' ', '+', $image);	
            $imageName = Str::random(40).'.'.$ext;
            Storage::put('public/felling/' . $imageName, base64_decode($image));
    

            $felling = Felling::create([
                'number_of_trees' => $request->number_of_trees,
                'site' => $request->site,
                'photo' => $imageName,
                'captured_by' => $request->captured_by,

            ]);
            
            return response()->json([
                'status' => true,
                'message' => "Felling Created Successfully",
                'project' => $felling
            ], 200);
        }

        
    }
}