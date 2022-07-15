<?php

namespace App\Http\Controllers;

use App\Models\Felling;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Fellings extends Controller
{
    public function index(){
        $fellings = Felling::all();

        $fellings = DB::table('fellings')
            ->join('users', 'fellings.captured_by', '=', 'users.id')
            ->join('sites', 'fellings.site', '=', 'sites.id')
            ->select('fellings.*', 'users.name', 'sites.name as sitename')
            ->get();

        return view('admin.felling', [
            'fellings' => $fellings
        ]);
    }
}