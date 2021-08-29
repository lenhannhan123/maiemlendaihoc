<?php

use App\Http\Controllers\Majorscontroller;
use App\Http\Controllers\schoolcontroller;
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
    return view('home');
});



Route::get('/search', function () {
    return view('search');
});


Route::get('/admin', function () {
    return view('adminhome');
});



Route::get('/schoollist',[schoolcontroller::class, "schoollist"])->name("schoollist");
Route::get('/schoollist/view',[schoolcontroller::class, "schoolview"])->name("shoolview");
Route::get('/schoollist/edit',[schoolcontroller::class, "schooleditview"])->name("schooleditview");
Route::post('/schoollist/edit',[schoolcontroller::class, "schooledit"])->name("schooledit");


Route::get('/schoollist/delete',[schoolcontroller::class, "schooldelete"])->name("delete");

Route::get('/addschool',[schoolcontroller::class, "getaddschool"]);

Route::post('/addschool', [schoolcontroller::class, "addschool"]);



Route::get('/listgroupmajors',[Majorscontroller::class, "listgroupmajors"]) ->name("listgroupmajors");

Route::post('/listgroupmajors/add',[Majorscontroller::class, "addgroupmajors"]) ->name("addgroupmajors");

Route::post('/listgroupmajors/edit',[Majorscontroller::class, "editgroupmajors"]) ->name("editgroupmajors");
Route::get('/listgroupmajors/delete',[Majorscontroller::class, "deletegroupmajors"]) ->name("deletegroupmajors");



Route::get('/listmajors',[Majorscontroller::class, "listmajors"]) ->name("listmajors");
Route::post('/listmajors/add',[Majorscontroller::class, "addmajors"]) ->name("addmajors");
Route::post('/listmajors/edit',[Majorscontroller::class, "editlistmajors"]) ->name("editlistmajors");





