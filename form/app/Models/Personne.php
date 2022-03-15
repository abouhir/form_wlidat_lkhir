<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $fillable=[
        "name" , 
        "fonctionnelle" , 
        "competences" ,
        "user_id" , 
        "responsable_id" , 
        "mot"
    ];


    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function responsable(){
        return $this->belongsTo(Responsable::class, 'responsable_id');
    }
}
