<?php

use App\Http\Controllers\Majorscontroller;
use App\Http\Controllers\programstudy;
use App\Http\Controllers\schoolcontroller;
use App\Http\Controllers\schoolmajorscontroller;
use App\Http\Controllers\AccountController;
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


//--------------------------------------------------------------------------
//Phần Thiện
Route::get('/admin', function () {
    return view('adminhome');
})->middleware(['auth'])->name('adminhome');
require __DIR__.'/auth.php';

Route::get('/accountlist',[AccountController::class,"accountlist"])->name("accountlist");
Route::get('/accountlist/createaccount',[AccountController::class,"createaccount"])->name("createaccount");
Route::post('/accountlist/postCreate', [AccountController::class, "postCreate"]);
Route::get('/delete/{id}', [AccountController::class, "delete"]);

//--------------------------------------------------------------------------



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
Route::get('/listmajors/delete',[Majorscontroller::class, "deletelistmajors"]) ->name("deletelistmajors");

Route::get('/program',[programstudy::class, "listprogram"]) ->name("listprogram");
Route::post('/program/add',[programstudy::class, "addprogram"]) ->name("addprogram");
Route::post('/program/edit',[programstudy::class, "editprogram"]) ->name("editprogram");
Route::get('/program/delete',[programstudy::class, "deleteprogram"]) ->name("deleteprogram");


Route::get('/schoolmajors',[schoolmajorscontroller::class, "schoolmajors"]) ->name("schoolmajors");
Route::get('/schoolmajors/add',[schoolmajorscontroller::class, "getadd"]) ->name("getadd");
Route::post('/schoolmajors/add',[schoolmajorscontroller::class, "add"]) ->name("add");
Route::get('/schoolmajors/view',[schoolmajorscontroller::class, "viewschoolmajors"]) ->name("viewschoolmajors");
Route::get('/schoolmajors/edit',[schoolmajorscontroller::class, "geteditschoolmajors"]) ->name("geteditschoolmajors");
Route::post('/schoolmajors/edit',[schoolmajorscontroller::class, "editschoolmajors"]) ->name("editschoolmajors");
Route::get('/schoolmajors/delete',[schoolmajorscontroller::class, "deleteschoolmajors"]) ->name("deleteschoolmajors");






Route::get('admin/blog', 'BlogController@index')->name('admin.blog');
Route::get('admin/blog/create', 'BlogController@create')->name('admin.blog.create');
Route::POST('admin/blog/checkcreate', 'BlogController@checkcreate')->name('admin.blog.checkcreate');
Route::get('admin/blog/update/{id}', 'BlogController@update')->name('admin.blog.update');
Route::post('admin/blog/checkupdate/{id}', 'BlogController@checkupdate')->name('admin.blog.checkupdate');
Route::get('admin/blog/delete/{id}', 'BlogController@delete')->name('admin.blog.delete');
Route::get('admin/blog/view/{id}', 'BlogController@view')->name('admin.blog.view');

Route::get('blog', 'BlogViewController@index');




