<?php

namespace App\Http\Controllers;

use App\Models\Tables;
use Illuminate\Http\Request;
use Laravel\Prompts\Table;

class TablesController extends Controller
{
    public function allTables(){
        $tables = Tables::all();
        return view("tables.index" , compact('tables'));
    }
    public function addTable(Request $request){

        $validateData = [
            'tableName'=>"required",
        ];

        $request->validate($validateData);

        Tables::create([
            'tableName'=>$request->tableName ,
        ]);
        return back()->with("message","table created successFully") ;

    }

    public function delTable(Tables $table){

        $table->delete();
        return back()->with('message',"table deleted successFully");
    }
}
