<?php

use App\Http\Controllers\Fellings;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Sites;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});


Route::get('/sites', [Sites::class, 'view_sites'])->name('sites');
Route::post('/add_site', [Sites::class, 'add_site'])->name('add_site');

Route::get('/projects', [Projects::class, 'view_projects'])->name('projects');
Route::post('/add_project', [Projects::class, 'add_project'])->name('add_project');

Route::get('/felling', [Fellings::class, 'index'])->name('felling');