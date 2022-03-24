<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use App\Models\Responsable;
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
        if(Auth::user()->role=='admin'){
            $enfants = Enfant::all();
        }else{
           $enfants = Auth::user()->enfants; 
        }
        
        return view("enfant.index")->with("enfants",$enfants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role=='admin'){
            $responsables =Responsable::all() ;
        }else{
            $responsables = Auth::user()->responsables;
        }
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
         "responsable" => "required" , 
         "handicape" => "required" , 
         "age"=> "required"

     ]);
     $input=$request->all();
     if(empty($request->type_handicap)){
        $input['type_handicap'] = "0";
    }
     $enfant = Enfant::create([
         "name"=> $request->name , 
         "taille_vtm" => $request->taille_vtm , 
         "taille_chaussure" => $request->taille_chaussure , 
         "niveaux_etd"=>$request->niveaux_etd , 
         "moyenne_s1" => $request->moyenne_s1 , 
         "moyenne_s2"=>$request->moyenne_s2 , 
         "responsable_id"=>$request->responsable , 
         "user_id" => Auth::id() , 
         "age" => $request->age , 
         "handicape" => $request->handicape , 
         "type_handicap" => $input['type_handicap'],
         "mot" => Crypt::encryptString((Enfant::max('id')+1)."".$request->name)
         ]) ; 

         return redirect()->route("enfant.index")->with("message","تم الإنشاء بنجاح");

     
       
    }

    
    public function show($mot)
    {
        $enfant =  Enfant::all()->where("mot",$mot)->first();
        return view("enfant.show")->with("enfant",$enfant);
    }

    
    public function edit($mot)
    {   
        if(Auth::user()->role=='admin'){
            $responsables =Responsable::all();
        }else{
            $responsables = Auth::user()->responsables;
        }
    
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
            "responsable" => "required" , 
            "handicape" => "required" , 
            "age"=> "required"
   
        ]);
      
            $enfant->name=$request->name ;
            $enfant->taille_vtm= $request->taille_vtm ; 
            $enfant->taille_chaussure = $request->taille_chaussure ;
            $enfant->niveaux_etd=$request->niveaux_etd ;
            $enfant->moyenne_s1= $request->moyenne_s1 ;
            $enfant->moyenne_s2=$request->moyenne_s2 ;
            $enfant->responsable_id=$request->responsable ;
            $enfant->handicape = $request->handicape ;
            if(empty($request->type_handicap )){
                $enfant->type_handicap = "0" ;
            }else{
                $enfant->type_handicap = $request->type_handicap ;
            }
            $enfant->age = $request->age ;
           
            $enfant->save();
            return redirect()->back()->with("message","تم التحديث بنجاح");
    }

    
    public function search(Request $request){
        if(empty($request->search)){
            return redirect()->route("enfant.index");
        }else{
            
            //$responsables = Auth::user()->responsables->where("cin","LIKE",$request->cin."%");
            if(Auth::user()->role=='admin'){
                $enfants = Enfant::join('users',function($join){
                $join->on('users.id', '=', 'enfants.user_id');
            })
            ->join('responsables',function($join){
                $join->on('responsables.id', '=', 'enfants.responsable_id');
            })
            ->where('enfants.name','LIKE',"%".$request->search."%")
            ->orWhere('enfants.taille_vtm','LIKE',"%".$request->search."%")
            ->orWhere('enfants.taille_chaussure','LIKE',"%".$request->search."%")
            ->orWhere('enfants.niveaux_etd','LIKE',"%".$request->search."%")
            ->orWhere('enfants.moyenne_s1','LIKE',"%".$request->search."%")
            ->orWhere('enfants.moyenne_s2','LIKE',"%".$request->search."%")
            ->orWhere('users.name','LIKE',"%".$request->search."%")
            ->orWhere('responsables.name','LIKE',"%".$request->search."%")
            ->get("enfants.*")
            ;
        }else{
            $enfants = Enfant::join('users',function($join){
                $join->on('users.id', '=', 'enfants.user_id');
            })
            ->join('responsables',function($join){
                $join->on('responsables.id', '=', 'enfants.responsable_id');
            })
            ->where(function($query){
                $query->where('enfants.user_id','=',Auth::id());
               
            }) 
            ->where(
                function($query) use($request) {
                    $query->where('enfants.taille_vtm','LIKE',"%".$request->search."%")
                    ->orWhere('enfants.taille_chaussure','LIKE',"%".$request->search."%")
                    ->orWhere('enfants.niveaux_etd','LIKE',"%".$request->search."%")
                    ->orWhere('enfants.moyenne_s1','LIKE',"%".$request->search."%")
                     ->orWhere('enfants.moyenne_s2','LIKE',"%".$request->search."%")
                    ->orWhere('enfants.name','LIKE',"%".$request->search."%")
                    ->orWhere('users.name','LIKE',"%".$request->search."%")
                    ->orWhere('responsables.name','LIKE',"%".$request->search."%")
                    ;
                })
            ->get("enfants.*");
            
        }
            
            
           
           
            return view("enfant.index")->with("enfants",$enfants);
            
        }
        
        
       
    }

   
    public function destroy($mot)
    {
        $enfant = Enfant::all()->where("mot",$mot)->first();
        $enfant->delete();
        return redirect()->route("enfant.index")->with("message","تم الحدف بنجاح");
    }
}
