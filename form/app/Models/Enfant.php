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
        "moyenne_s2" , 
        "responsable_id" ,
        "user_id" , 
        "mot"
    ];

    public function user()

    
    {
        return $this->belongsTo(User::class,"user_id");
        
    }
    public function responsable()

    
    {
        return $this->belongsTo(Responsable::class,"responsable_id");
        
    }

}
