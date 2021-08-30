<?php

namespace App\Http\Controllers;

use App\Models\groupmajors;
use App\Models\mojors;
use App\Models\School;
use Illuminate\Http\Request;

class schoolmajorscontroller extends Controller
{
    public function getadd(Request $request)
    {

     $school = School::select('id_school','name_school')->get();
     $groupmajors = groupmajors::all();
     $majors = mojors::all();      
        return view("admin-school-majors.create", compact('school','groupmajors','majors'));
    }



}
