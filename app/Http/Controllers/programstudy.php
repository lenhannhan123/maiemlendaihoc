<?php

namespace App\Http\Controllers;

use App\Models\programstudy as ModelsProgramstudy;
use Illuminate\Http\Request;

class programstudy extends Controller
{
    public function listprogram(Request $request)
    {

        $ds=ModelsProgramstudy::OrderBy('ID', 'ASC')->paginate(10);
      
        return view("Admin-program.listprogram",compact("ds"));
    }
    


    
    public function addprogram(Request $request){
        $ds["ID"]=null;
        $ds["Program_name"]= $request->all()["Program_name"];
        ModelsProgramstudy::create($ds);
        return redirect()->route('listprogram');
    }


    
    public function editprogram(Request $request){
       
        $ds["ID"]= $request->all()["ID_program"];
        $ds["Program_name"]= $request->all()["name1"];
        ModelsProgramstudy::where("ID",$ds["ID"])->update(["Program_name"=>$ds["Program_name"]]);
        return redirect()->route('listprogram');

    }


    
    public function deleteprogram(Request $request){
       
        $id= $request->all()["id"];
        ModelsProgramstudy::where("ID",$id)->delete();
        return redirect()->route('listprogram');

    }

    
}
