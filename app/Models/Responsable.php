<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "user_id" ,
        "name",
        "cin",
        "situation" , 
        "adresse" , 
        "telephone" , 
        "mot" ,
        "cin_image_recto" , 
        "cin_image_verso" , 
        "handicape" , 
        "type_handicap" ,
        "age"
    ];


    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

  
    public function personnes()
    {
        return $this->hasMany(Personne::class, 'responsable_id');
    }

    public function enfants()
    {
        return $this->hasMany(Enfant::class, 'responsable_id');
    }
}
