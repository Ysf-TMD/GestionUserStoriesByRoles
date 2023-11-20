<?php

namespace App\Http\Controllers;

use App\Models\Attributs;
use App\Models\Tables;
use Illuminate\Http\Request;

class AttributsController extends Controller
{
    public function allAttributs(Tables $table){
        $attributs = Attributs::where("id_table",'=',$table->id)->get();
        return view("tables.showTables",compact("table","attributs"));
    }
    public function addAttribut(Request $request , Tables $table){

        $data = [
          'nomAttribut'=>"required",
          "type"=>"required"
        ];
        $res = $request->validate($data);

        Attributs::create([
            'nomAttribut'=>$request->nomAttribut,
            "type"=>$request->type,
            "id_table"=>$table->id
        ]);

        return back()->with('message','attribut ajouté en success');


    }


    public function deleteAttribut(Attributs $attribut){
        $attribut->delete();
        return back()->with('message','Attribut '.$attribut->nameAttribut." supprimé en success");
    }
}
