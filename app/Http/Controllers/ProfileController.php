<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Models\UserStorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function index(){
        $profiles = Profile::latest()->get();
        return view("welcome",compact("profiles"));
    }
     public function ajouterProfile(Request $req){
        $role = $req->role ;
         if($role =="selectValue"){
             return  back()->with("messageForme","Selectioner Un Role Svp !!!");
         }

        $req->validate([
            "nomUtilisateur"=>["required","min:3"],
            "role"=>["required"]

        ]);

        $profile = Profile::create([
            "nomUtilisateur"=>$req->nomUtilisateur,
            "role"=>$req->role
        ]);
        return back()->with("message","Profile Ajouter en Success");

     }
     public function afficherUserStories(Request $profile , ){
        $profileFound = Profile::find($profile->id);
        $userStories = DB::table("user_stories")->where("id_utilisateur",$profile->id)->latest()->get();
        return view("userStories.userStories",compact("userStories" , "profileFound"));
     }





   public function supprimerProfile(Profile $profile){
        $profile->delete();
            return back()->with("message","Profile Supprimer avec success");
   }
}
