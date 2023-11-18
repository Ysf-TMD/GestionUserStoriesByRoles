<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\UserStorie;
use Illuminate\Http\Request;

class UserStorieController extends Controller
{

    public function ajouterUserStorie(Request $request ,$profile){


        $data = [
            "nomUserStorie"=>["required","min:3"],
            "description"=>["required","min:3"],
        ];

        $rolesPersonnalisé = [
            "nomUserStorie.required"=>"Le champ Nom UserStorie est Obligatoire" ,
            "description.required"=>"Le champ Description est Obligatoire",
        ];

        $request->validate($data ,$rolesPersonnalisé);


        UserStorie::create([
            "nomUserStorie"=>$request->nomUserStorie,
            "Description" => $request->description,
            "id_utilisateur"=>$profile
        ]);

        return back()->with("message","UserStorie Ajouter En Success");



    }

    public function supprimerUserStorie( $story){
        UserStorie::find($story)->delete();
        return back()->with("message","UserStorie A été Supprimer En Success");

    }



}
