<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "name" , 
        "taille_vtm" , 
        "taille_chaussure" , 
        "niveaux_etd" , 
        "moyenne_s1" , 
        "moyenne_s2"
    ];

}
