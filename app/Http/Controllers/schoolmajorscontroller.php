<?php

namespace App\Http\Controllers;

use App\Models\groupmajors;
use App\Models\mojors;
use App\Models\programstudy;
use App\Models\School;
use App\Models\school_majors_image;
use App\Models\school_majors_link;
use App\Models\schoolmaojors;
use App\Models\schoolmaojorsdetails;
use Illuminate\Http\Request;

class schoolmajorscontroller extends Controller
{
    public function getadd(Request $request)
    {

     $school = School::select('id_school','name_school')->get();
     $groupmajors = groupmajors::all();
     $majors = mojors::all();  
     $program = programstudy::all();       
        return view("admin-school-majors.create", compact('school','groupmajors','majors','program'));
    }

    public function add(Request $request)
    {

    $ds=$request->all();

    $schoolmajors["ID_school_majors"]=null;
    $schoolmajors["ID_school"]=$ds["ID_school"];
    $schoolmajors["ID_group_majors"]=$ds["ID_group_majors"];
    $schoolmajors["ID_majors"]=$ds["ID_majors"];
    $schoolmajors["ID_school_programs"]=$ds["ID_school_programs"];
    $schoolmajors["Title"]=$ds["Title"];
    $schoolmajors["description"]=$ds["description"];
    $schoolmajors["duration"]=$ds["duration"];
    $schoolmajors["Pace"]=$ds["Pace"];
    $schoolmajors["Teaching_language"]=$ds["Teaching_language"];
    $schoolmajors["study_type"]=$ds["study_type"];
    $schoolmajors["Tuition"]=$ds["Tuition"];
    $schoolmajors["benchmark"]=$ds["benchmark"];
    $schoolmajors["degree_type"]=$ds["degree_type"];
    $schoolmajors["recoverykey"]=rand(10,100);



   schoolmaojors::create($schoolmajors);
   $ID_school_majors = (schoolmaojors::where("recoverykey",$schoolmajors["recoverykey"])->select('ID_school_majors')->get()->first())["ID_school_majors"];

   schoolmaojors::where("ID_school_majors",$ID_school_majors)->update(["recoverykey"=>"0"]);

    $schooldeitails["ID_School_majors_detail"]=  null;
    $schooldeitails["ID_school_majors"]=  $ID_school_majors;
    $schooldeitails["text1"]=  $ds["text1"];
    $schooldeitails["text2"]=  $ds["text2"];
    $schooldeitails["text3"]=  $ds["text3"];
    $schooldeitails["text4"]=  $ds["text4"];
   schoolmaojorsdetails::create($schooldeitails);

        for($i=1;$i<=$ds["countlink"];$i++){
            if(isset($ds["linkyoutube".$i.""])){
                $link["ID_school_majors_link"]=null;
                $link["ID_school_majors"]=$ID_school_majors;
                $link["link"]=$ds["linkyoutube".$i.""];
                school_majors_link::create($link); 
            }
        }

        for($i=1;$i<=$ds["countimg"];$i++){
            if($request->hasFile('schoolimg' . $i . '')){
             
                if ($request->hasFile('schoolimg' . $i . '')) {
                    $file = $request->file('schoolimg' . $i . '');
                    // $extension = $file->getClientOriginalExtension();
    
                    $imageName = "{$ID_school_majors}{$i}.jpg";
                    $file->move("images/imgschoolmajors", $imageName);
                } else {
                    $imageName = null;
                }
                $img["ID_image"]=null;
                $img["ID_school_majors_detail"]=$ID_school_majors;
                $img["Image_name"]=$imageName;
                $img["description"]=null;

                school_majors_image::create($img); 
    
                
            }
        }



    dd($ds);
    }



}
