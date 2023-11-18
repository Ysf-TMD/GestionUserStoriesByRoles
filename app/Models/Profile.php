<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=["nomUtilisateur","role"];


    public function HasManyUserStories(){
        return $this->HasMany(UserStorie::class) ;
    }

}
