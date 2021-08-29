<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\schoolimage;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class schoolcontroller extends Controller
{

    public function getaddschool(Request $request)
    {
        $ds = School::all();

        return view("Admin-school.createschool", compact("ds"));
    }
    public function addschool(Request $request)
    {
        $ds = $request->all();

        $count = $ds["count"];

        $ds["id_school"] = strtoupper($ds["id_school"]); 

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            // $extension = $file->getClientOriginalExtension();

            $imageName = "{$ds['id_school']}.jpg";
            $file->move("images/logoschool", $imageName);
        } else {
            $imageName = null;
        }

        $addschool["id_school"] = $ds["id_school"];
        $addschool["name_school"] = $ds["name_school"];
        $addschool["logo"] = $imageName;
        $addschool["address"] = $ds["address"];
        $addschool["area"] = $ds["area"];
        $addschool["School_Introduction"] = $ds["School_Introduction"];
        $addschool["School_type"] = $ds["School_type"];
        $addschool["lat"] = $ds["lat"];
        $addschool["lng"] = $ds["lng"];
        $addschool["website"] = $ds["website"];

        School::create($addschool);


        for ($i = 1; $i <= $count; $i++) {

            if ($request->hasFile('schoolimg' . $i . '')) {
                $file = $request->file('schoolimg' . $i . '');
                // $extension = $file->getClientOriginalExtension();

                $imageName = "{$ds['id_school']}{$i}.jpg";
                $file->move("images/imgschool", $imageName);
            } else {
                $imageName = null;
            }


            $a[$i]["ID_image"] = null;
            $a[$i]["ID_school"] = $ds["id_school"];
            $a[$i]["Image_name"] = $imageName;
            $a[$i]["description"] = null;
        }

        for ($i = 1; $i <= $count; $i++) {

            schoolimage::create($a[$i]);
        }


        return redirect()->route('schoollist');
    }

    public function schoollist(Request $request)
    {


        $ds = School::OrderBy('id_school', 'ASC')->paginate(10);

        return view("Admin-school.listschool", compact("ds"));
    }

    public function schoolview(Request $request)
    {
        // $ds = School::where

        // dd($request->all());
        $id = $request->all()["id"];

        $school = School::where("id_school", $id)->get()->first();

        $schoolimage = schoolimage::where("ID_school", $id)->get();


        return view("Admin-school.viewschool", compact("school", "schoolimage"));
    }


    public function schooleditview(Request $request)
    {

        $ds = School::all();

        $id = $request->all()["id"];

        $school = School::where("id_school", $id)->get()->first();

        $schoolimage = schoolimage::where("ID_school", $id)->get();
        $count = count($schoolimage);

        return view("Admin-school.editschool", compact("school", "schoolimage", "ds", "count"));
    }

    public function schooledit(Request $request)
    {
        $ds = $request->all();
        $dsmau = school::where("id_school", $ds["id_school"])->get()->first();
        

        if (isset($ds["logo"])) { 
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                // $extension = $file->getClientOriginalExtension();

                $imageName = "{$ds['id_school']}.jpg";
                $file->move("images/logoschool", $imageName);
            } 

            $ds["logo"]=$imageName;
        } else {
            $ds["logo"] = $dsmau["logo"]; $ds["logo"] = $dsmau["logo"];
     
        }

   
        school::where("id_school", $ds["id_school"])->update(['name_school'=>$ds["name_school"], 'address'=>$ds["address"] , 'area'=>$ds["area"], 'School_Introduction'=>$ds["School_Introduction"] , 'School_type'=>$ds["School_type"]  , 'lat'=>$ds["lat"] , 'lng'=>$ds["lng"]  , 'website'=>$ds["website"] ,'logo'=> $ds["logo"] ]);


            $count1 = count(schoolimage::where("id_school", $ds["id_school"])->get());


        if($count1>0){
            for ($i=1;$i<=$count1;$i++){


                if (isset($ds['schoolimg' . $i . ''])) {
               
                } else {
              
                    if ($request->hasFile('schoolimg' . $i . '')) {
                        $file = $request->file('schoolimg' . $i . '');
                        // $extension = $file->getClientOriginalExtension();
        
                        $imageName = "{$ds['id_school']}{$i}.jpg";
                        $file->move("images/imgschool", $imageName);
                    } 
                }
            }
        }

          
           $count= $ds["count"];

           
            if($count>$count1){
                for($i=$count1+1;$i<=$count;$i++){

                    if ($request->hasFile('schoolimg' . $i . '')) {
                        $file = $request->file('schoolimg' . $i . '');
                        // $extension = $file->getClientOriginalExtension();
        
                        $imageName = "{$ds['id_school']}{$i}.jpg";
                        $file->move("images/imgschool", $imageName);
                    } 

                    $a["ID_image"] = null;
                    $a["ID_school"] = $ds["id_school"];
                    $a["Image_name"] = $imageName;
                    $a["description"] = null;
                    
                    schoolimage::create($a);
                } 

            }

            


            return redirect()->route('schoollist');
    }



    public function schooldelete(Request $request){
        $id = $request->all();;

        schoolimage::where("ID_school",$id)->delete();
        school::where("id_school",$id)->delete();

        return redirect()->route('schoollist');
    }


    


}
