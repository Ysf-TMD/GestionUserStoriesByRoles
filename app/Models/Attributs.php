<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributs extends Model
{
    use HasFactory;
    protected $fillable = ["nomAttribut","type","id_table"];
}
