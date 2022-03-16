<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Responsable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PersonneController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
   }
    public function index()
    {
        $personnes= Auth::user()->personnes;
        return view("personne.index")->with("personnes",$personnes);
    }

    
    public function create()
    {
        $responsables = Auth::user()->responsables;
        return view("personne.create")->with("responsables",$responsables);
    }

    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            "name" => "required|max:255" , 
            "fonctionnelle" => "required" , 
            "competences" => "required" , 
        ]);

        $personne = Personne::create([
            "name"=>$request->name , 
            "fonctionnelle" => $request->fonctionnelle , 
            "competences" => $request->competences ,
            "user_id" => Auth::id() , 
            "responsable_id" => $request->responsable , 
            "mot" =>Crypt::encryptString((Personne::max('id')+1)."".$request->name)
        ]);
       

        return redirect()->route("personne.index")->with("message","تم الإنشاء بنجاح");
    }

    
    public function show($mot)
    {
        $personne=Personne::all()->where("mot",$mot)->first();
        return view("personne.show")->with("personne",$personne);
    }

   
    public function edit($mot)
    {
        $personne = Personne::all()->where("mot",$mot)->first();
        $responsables = Auth::user()->responsables;
        return view("personne.edit")->with(["personne" => $personne , "responsables" => $responsables]);
    }

    
    public function update(Request $request, $mot)
    {
        $personne = Personne::all()->where("mot",$mot)->first();
        $validated = $request->validate([
            "name" => "required|max:255" , 
            "fonctionnelle" => "required" , 
            "competences" => "required" , 
        ]);

        
            $personne->name=$request->name ;
            $personne->fonctionnelle = $request->fonctionnelle ;
            $personne->competences = $request->competences ;
            $personne->responsable_id= $request->responsable ;
            $personne->save();  
        return redirect()->back()->with("message","تم التحديث بنجاح");
    }

    
    public function destroy($mot)
    {
        $personne = Personne::all()->where("mot",$mot)->first()->delete();

        return redirect()->route("personne.index")->with("message","تم الحدف بنجاح");
}
}
