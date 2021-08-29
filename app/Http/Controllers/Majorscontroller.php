<?php

namespace App\Http\Controllers;

use App\Models\groupmajors;
use App\Models\mojors;
use Illuminate\Http\Request;

class Majorscontroller extends Controller
{
    public function listgroupmajors(Request $request)
    {

        $ds=groupmajors::OrderBy('ID_group_major', 'ASC')->paginate(10);
      
        return view("Admin-majors.listgroumajors",compact("ds"));
    }

    public function addgroupmajors(Request $request){
        $ds["ID_group_major"]=null;
        $ds["name"]= $request->all()["name"];
        groupmajors::create($ds);
        return redirect()->route('listgroupmajors');
    }

    public function editgroupmajors(Request $request){
       
        $ds["ID_group_major"]= $request->all()["ID_group_major"];
        $ds["name"]= $request->all()["name1"];
        groupmajors::where("ID_group_major",$ds["ID_group_major"])->update(["name"=>$ds["name"]]);
        return redirect()->route('listgroupmajors');

    }

    public function deletegroupmajors(Request $request){
       
        $id= $request->all()["id"];
        groupmajors::where("ID_group_major",$id)->delete();
        return redirect()->route('listgroupmajors');

    }


    public function listmajors(Request $request){
        $groupmajors=groupmajors::all();
        $ds= mojors::OrderBy('ID_majors', 'ASC')->paginate(10);;

        
        return view("Admin-majors.listmajors",compact("ds","groupmajors"));
    }

    public function addmajors(Request $request){
 
        $ds["ID_majors"]=null;
        $ds["ID_group_majors"]=$request->all()["groupmajors"];
        $ds["name"]= $request->all()["name"];


        mojors::create($ds);
        return redirect()->route('listmajors');
    }

    public function editlistmajors(Request $request){
       


        $ds["ID_majors"]= $request->all()["ID_majors"];
        $ds["ID_group_majors"]= $request->all()["groupmajors"];
        $ds["name"]= $request->all()["name1"];
       
        mojors::where("ID_majors",$ds["ID_majors"])->update( [ "ID_group_majors"=>$ds["ID_group_majors"] ,"name"=>$ds["name"]  ]);
        return redirect()->route('listmajors');

    }

    

    

    


}
