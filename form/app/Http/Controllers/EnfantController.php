<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EnfantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $enfants = Auth::user()->enfants;
        return view("enfant.index")->with("enfants",$enfants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responsables = Auth::user()->responsables;
        return view("enfant.create")->with("responsables",$responsables);
    }

    
    public function store(Request $request)
    {
     $validate = $this->validate($request,[
         "name"=>"required" , 
         "taille_vtm" => "required" , 
         "taille_chaussure"=>"required" , 
         "niveaux_etd"=>"required" , 
         "moyenne_s1"=>"required" ,
         "moyenne_s2"=>"required",
         "responsable" => "required"

     ]);
     $enfant = Enfant::create([
         "name"=> $request->name , 
         "taille_vtm" => $request->taille_vtm , 
         "taille_chaussure" => $request->taille_chaussure , 
         "niveaux_etd"=>$request->niveaux_etd , 
         "moyenne_s1" => $request->moyenne_s1 , 
         "moyenne_s2"=>$request->moyenne_s2 , 
         "responsable_id"=>$request->responsable , 
         "user_id" => Auth::id() , 
         "mot" => Crypt::encryptString((Enfant::max('id')+1)."".$request->name)
         ]) ; 

         return redirect()->route("enfant.index");

     
       
    }

    
    public function show($mot)
    {
        $enfant =  Enfant::all()->where("mot",$mot)->first();
        return view("enfant.show")->with("enfant",$enfant);
    }

    
    public function edit($mot)
    {   $responsables = Auth::user()->responsables;
        $enfant = Enfant::all()->where("mot",$mot)->first();
        return view("enfant.edit")->with(["enfant"=>$enfant,"responsables"=>$responsables]);
    }

    
    public function update(Request $request, $mot)
    {
       
        $enfant = Enfant::all()->where("mot",$mot)->first();
        $validate = $this->validate($request,[
            "name"=>"required" , 
            "taille_vtm" => "required" , 
            "taille_chaussure"=>"required" , 
            "niveaux_etd"=>"required" , 
            "moyenne_s1"=>"required" ,
            "moyenne_s2"=>"required",
            "responsable" => "required"
   
        ]);
      
            $enfant->name=$request->name ;
            $enfant->taille_vtm= $request->taille_vtm ; 
            $enfant->taille_chaussure = $request->taille_chaussure ;
            $enfant->niveaux_etd=$request->niveaux_etd ;
            $enfant->moyenne_s1= $request->moyenne_s1 ;
            $enfant->moyenne_s2=$request->moyenne_s2 ;
            $enfant->responsable_id=$request->responsable ;
            $enfant->save();
            return redirect()->back();
    }

   
    public function destroy($mot)
    {
        $enfant = Enfant::all()->where("mot",$mot)->first();
        $enfant->delete();
        return redirect()->back();
    }
}
