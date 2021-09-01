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

        $school = School::select('id_school', 'name_school')->get();
        $groupmajors = groupmajors::all();
        $majors = mojors::all();
        $program = programstudy::all();
        return view("admin-school-majors.create", compact('school', 'groupmajors', 'majors', 'program'));
    }

    public function add(Request $request)
    {

        $ds = $request->all();

        $schoolmajors["ID_school_majors"] = null;
        $schoolmajors["ID_school"] = $ds["ID_school"];
        $schoolmajors["ID_group_majors"] = $ds["ID_group_majors"];
        $schoolmajors["ID_majors"] = $ds["ID_majors"];
        $schoolmajors["ID_school_programs"] = $ds["ID_school_programs"];
        $schoolmajors["Title"] = $ds["Title"];
        $schoolmajors["description"] = $ds["description"];
        $schoolmajors["duration"] = $ds["duration"];
        $schoolmajors["Pace"] = $ds["Pace"];
        $schoolmajors["Teaching_language"] = $ds["Teaching_language"];
        $schoolmajors["study_type"] = $ds["study_type"];
        $schoolmajors["Tuition"] = $ds["Tuition"];
        $schoolmajors["benchmark"] = $ds["benchmark"];
        $schoolmajors["degree_type"] = $ds["degree_type"];
        $schoolmajors["recoverykey"] = rand(10, 100);



        schoolmaojors::create($schoolmajors);
        $ID_school_majors = (schoolmaojors::where("recoverykey", $schoolmajors["recoverykey"])->select('ID_school_majors')->get()->first())["ID_school_majors"];

        schoolmaojors::where("ID_school_majors", $ID_school_majors)->update(["recoverykey" => "0"]);

        $schooldeitails["ID_School_majors_detail"] =  null;
        $schooldeitails["ID_school_majors"] =  $ID_school_majors;
        $schooldeitails["text1"] =  $ds["text1"];
        $schooldeitails["text2"] =  $ds["text2"];
        $schooldeitails["text3"] =  $ds["text3"];
        $schooldeitails["text4"] =  $ds["text4"];
        schoolmaojorsdetails::create($schooldeitails);

        for ($i = 1; $i <= $ds["countlink"]; $i++) {
            if (isset($ds["linkyoutube" . $i . ""])) {
                $link["ID_school_majors_link"] = null;
                $link["ID_school_majors"] = $ID_school_majors;
                $link["link"] = $ds["linkyoutube" . $i . ""];
                school_majors_link::create($link);
            }
        }

        for ($i = 1; $i <= $ds["countimg"]; $i++) {
            if ($request->hasFile('schoolimg' . $i . '')) {

                if ($request->hasFile('schoolimg' . $i . '')) {
                    $file = $request->file('schoolimg' . $i . '');
                    // $extension = $file->getClientOriginalExtension();

                    $imageName = "ID{$ID_school_majors}N{$i}.jpg";
                    $file->move("images/imgschoolmajors", $imageName);
                } else {
                    $imageName = null;
                }
                $img["ID_image"] = null;
                $img["ID_school_majors_detail"] = $ID_school_majors;
                $img["Image_name"] = $imageName;
                $img["description"] = null;

                school_majors_image::create($img);
            }
        }


        return redirect()->route('schoolmajors');
    }

    public function schoolmajors(Request $request)
    {

        $ds = schoolmaojors::select("ID_school_majors", "Title", "ID_group_majors", "ID_majors", "ID_school")->OrderBy('Title', 'ASC')->paginate(10);

        $length = count($ds);

        for ($i = 0; $i < $length; $i++) {
            $ds[$i]["group"] = (groupmajors::where("ID_group_major", $ds[$i]["ID_group_majors"])->select("name")->get()->first())["name"];
        }

        for ($i = 0; $i < $length; $i++) {
            $ds[$i]["majors"] = (mojors::where("ID_majors", $ds[$i]["ID_majors"])->select("name")->get()->first())["name"];
        }

        for ($i = 0; $i < $length; $i++) {
            $ds[$i]["name_school"] = (School::where("id_school", $ds[$i]["ID_school"])->select("name_school")->get()->first())["name_school"];
        }


        return view("admin-school-majors.index", compact('ds'));
    }



    public function viewschoolmajors(Request $request)
    {
        $id = ($request->all())["id"];


        $ds = schoolmaojors::where("ID_school_majors", $id)->get()->first();

        $ds["group"] = (groupmajors::where("ID_group_major", $ds["ID_group_majors"])->select("name")->get()->first())["name"];

        $ds["majors"] = (mojors::where("ID_majors", $ds["ID_majors"])->select("name")->get()->first())["name"];

        $ds["name_school"] = (School::where("id_school", $ds["ID_school"])->select("name_school")->get()->first())["name_school"];
        $ds["Program_name"] = (programstudy::where("ID", $ds["ID_school_programs"])->select("Program_name")->get()->first())["Program_name"];


        $content= schoolmaojorsdetails::where("ID_school_majors",$id)->get()->first();
        $link= school_majors_link::where("ID_school_majors",$id)->select("link")->get();
        $image=school_majors_image::where("ID_school_majors_detail",$id)->select("Image_name")->get();

        // dd($link[0]["link"]);

        return view("admin-school-majors.view", compact('ds', 'content', 'link', 'image'));
    }

    public function geteditschoolmajors(Request $request){
        $id = ($request->all())["id"];


        $ds = schoolmaojors::where("ID_school_majors", $id)->get()->first();

        $ds["group"] = (groupmajors::where("ID_group_major", $ds["ID_group_majors"])->select("name")->get()->first())["name"];

        $ds["majors"] = (mojors::where("ID_majors", $ds["ID_majors"])->select("name")->get()->first())["name"];

        $ds["name_school"] = (School::where("id_school", $ds["ID_school"])->select("name_school")->get()->first())["name_school"];
        $ds["Program_name"] = (programstudy::where("ID", $ds["ID_school_programs"])->select("Program_name")->get()->first())["Program_name"];


        $content= schoolmaojorsdetails::where("ID_school_majors",$id)->get()->first();
        $link= school_majors_link::where("ID_school_majors",$id)->select("link")->get();
        $image=school_majors_image::where("ID_school_majors_detail",$id)->select("Image_name")->get();

        $school = School::select('id_school', 'name_school')->get();
        $groupmajors = groupmajors::all();
        $majors = mojors::all();
        $program = programstudy::all();

        // dd($ds);
        return view("admin-school-majors.edit", compact('ds', 'content', 'link', 'image','school', 'groupmajors', 'majors', 'program'));

    }


    public function editschoolmajors(Request $request){
        $ds= $request->all();


        $schoolmajors["ID_school_majors"] = $ds["ID_school_majors"];
        $schoolmajors["ID_school"] = $ds["ID_school"];
        $schoolmajors["ID_group_majors"] = $ds["ID_group_majors"];
        $schoolmajors["ID_majors"] = $ds["ID_majors"];
        $schoolmajors["ID_school_programs"] = $ds["ID_school_programs"];
        $schoolmajors["Title"] = $ds["Title"];
        $schoolmajors["description"] = $ds["description"];
        $schoolmajors["duration"] = $ds["duration"];
        $schoolmajors["Pace"] = $ds["Pace"];
        $schoolmajors["Teaching_language"] = $ds["Teaching_language"];
        $schoolmajors["study_type"] = $ds["study_type"];
        $schoolmajors["Tuition"] = $ds["Tuition"];
        $schoolmajors["benchmark"] = $ds["benchmark"];
        $schoolmajors["degree_type"] = $ds["degree_type"];

        schoolmaojors::where("ID_school_majors", $schoolmajors["ID_school_majors"])->update(["ID_school"=>$schoolmajors["ID_school"], "ID_group_majors"=> $schoolmajors["ID_group_majors"]  , "ID_majors"=> $schoolmajors["ID_majors"], "ID_school_programs"=>$schoolmajors["ID_school_programs"], "Title"=>$schoolmajors["Title"], "description"=>$schoolmajors["description"], "duration"=>$schoolmajors["duration"], "Pace"=>$schoolmajors["Pace"], "Teaching_language"=>$schoolmajors["Teaching_language"], "Tuition"=>$schoolmajors["Tuition"], "study_type"=>$schoolmajors["study_type"], "benchmark"=>$schoolmajors["benchmark"], "degree_type"=>$schoolmajors["degree_type"] ]);
       

        $schooldeitails["ID_school_majors"] =  $schoolmajors["ID_school_majors"];
        $schooldeitails["text1"] =  $ds["text1"];
        $schooldeitails["text2"] =  $ds["text2"];
        $schooldeitails["text3"] =  $ds["text3"];
        $schooldeitails["text4"] =  $ds["text4"];
        // schoolmaojorsdetails::where("ID_school_majors", $schoolmajors["ID_school_majors"]) ->update(["text1"=>$schooldeitails["text1"], "text2"=> $schooldeitails["text2"]  , "text3"=> $schooldeitails["text3"], "text4"=>$schooldeitails["text4"] ]);
        schoolmaojorsdetails::where("ID_school_majors", $schoolmajors["ID_school_majors"]) ->update(["text1"=>$schooldeitails["text1"] , "text2" => $schooldeitails["text2"]  ,  "text3"=> $schooldeitails["text3"] , "text4"=>$schooldeitails["text4"] ]);

        $idlink = school_majors_link::where("ID_school_majors",$schooldeitails["ID_school_majors"])->get()->all();
        $countlink = count($idlink);

        for($i=0;$i< $countlink;$i++){
            if( $idlink[$i]["link"]  != $ds["linkyoutube".($i+1).""] ){

                school_majors_link::where("ID_school_majors_link",$idlink[$i]["ID_school_majors_link"]) ->update(["link"=>$ds["linkyoutube".($i+1).""]]);;

            }
        }



        if($ds["countlink"]>$countlink ){

            for ($i = $countlink+1; $i <= $ds["countlink"]; $i++) {
                if (isset($ds["linkyoutube" . $i . ""])) {
                    $link["ID_school_majors_link"] = null;
                    $link["ID_school_majors"] = $schoolmajors["ID_school_majors"];
                    $link["link"] = $ds["linkyoutube" . $i . ""];
                    school_majors_link::create($link);
                }
            }

        }



        $count1 = count(school_majors_image::where("ID_school_majors_detail", $schoolmajors["ID_school_majors"])->get());
      

        if($count1>0){
            for ($i=1;$i<=$count1;$i++){


                if (isset($ds['schoolimg' . $i . ''])) {

                        if ($request->hasFile('schoolimg' . $i . '')) {
                            $file = $request->file('schoolimg' . $i . '');
                            // $extension = $file->getClientOriginalExtension();
            
                            $imageName = "ID{$schoolmajors["ID_school_majors"]}N{$i}.jpg";
                            $file->move("images/imgschoolmajors", $imageName);
                        } 

                } else {
              
                    if ($request->hasFile('schoolimg' . $i . '')) {
                        $file = $request->file('schoolimg' . $i . '');
                        // $extension = $file->getClientOriginalExtension();
                        
                        $imageName = "ID{$schoolmajors["ID_school_majors"]}N{$i}.jpg";
                        $file->move("images/imgschoolmajors", $imageName);
                    } 
                }
            }
        }

        $count= $ds["countimg"];

    
           
        if($count>$count1){
   
            for($i=$count1+1;$i<=$count;$i++){

                if ($request->hasFile('schoolimg' . $i . '')) {
                    $file = $request->file('schoolimg' . $i . '');
                    // $extension = $file->getClientOriginalExtension();
    
                    $imageName = "ID{$schoolmajors["ID_school_majors"]}N{$i}.jpg";
                    $file->move("images/imgschoolmajors", $imageName);
                } 

                $img["ID_image"] = null;
                $img["ID_school_majors_detail"] = $schoolmajors["ID_school_majors"];
                $img["Image_name"] = $imageName;
                $img["description"] = null;
                school_majors_image::create($img);
            } 

        }
 

        return redirect()->route('schoolmajors');
    }
    

    public function deleteschoolmajors(Request $request){
       $id = $request->all()["id"];
        $image =  school_majors_image::where("ID_school_majors_detail",$id)->select("Image_name")->get();

        foreach($image as $item){

            $str=  "images/imgschoolmajors/".$item["Image_name"];
            unlink($str);
        }
        
        
        

       school_majors_image::where("ID_school_majors_detail",$id)->delete();
       school_majors_link::where("ID_school_majors",$id)->delete();
       schoolmaojorsdetails::where("ID_school_majors",$id)->delete();
       schoolmaojors::where("ID_school_majors",$id)->delete();

    
       return redirect()->route('schoolmajors');
    }


     
}
