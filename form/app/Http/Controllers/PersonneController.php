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
        if(Auth::user()->role=='admin'){
            $personnes= Personne::all();
        }else{
        $personnes= Auth::user()->personnes;
    }
        return view("personne.index")->with("personnes",$personnes);
    }

    
    public function create()
    {
        if(Auth::user()->role=='admin'){
            $responsables =Responsable::all();
        }else{
            $responsables = Auth::user()->responsables;
        }
      
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
        if(Auth::user()->role=='admin'){
        $responsables =Responsable::all();
        }else{
        $responsables = Auth::user()->responsables;
    }
       
      
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

    public function search(Request $request){
        if(empty($request->search)){
            return redirect()->route("personne.index");
        }else{
            
            //$responsables = Auth::user()->responsables->where("cin","LIKE",$request->cin."%");
            if(Auth::user()->role=='admin'){
                $personnes = Personne::join('users',function($join){
                $join->on('users.id', '=', 'personnes.user_id');
            })
            ->join('responsables',function($join){
                $join->on('responsables.id', '=', 'personnes.responsable_id');
            })
            ->where('personnes.name','LIKE',"%".$request->search."%")
            ->orWhere('personnes.fonctionnelle','LIKE',"%".$request->search."%")
            ->orWhere('personnes.competences','LIKE',"%".$request->search."%")
            ->orWhere('users.name','LIKE',"%".$request->search."%")
            ->orWhere('responsables.name','LIKE',"%".$request->search."%")
            ->get("personnes.*");
        }else{
            $personnes = personne::join('users',function($join){
                $join->on('users.id', '=', 'personnes.user_id');
            })
            ->join('responsables',function($join){
                $join->on('responsables.id', '=', 'personnes.responsable_id');
            })
            ->where(function($query){
                $query->where('personnes.user_id','=',Auth::id());
               
            }) 
            ->where(
                function($query) use($request) {
                    $query->where('personnes.name','LIKE',"%".$request->search."%")
                    ->orWhere('personnes.fonctionnelle','LIKE',"%".$request->search."%")
                    ->orWhere('personnes.competences','LIKE',"%".$request->search."%")
                    ->orWhere('users.name','LIKE',"%".$request->search."%")
                    ->orWhere('responsables.name','LIKE',"%".$request->search."%")
                    ;
                })
            ->get("personnes.*");

            
            
        }

        return view("personne.index")->with("personnes",$personnes);
    }
}

    
    public function destroy($mot)
    {
        $personne = Personne::all()->where("mot",$mot)->first()->delete();

        return redirect()->route("personne.index")->with("message","تم الحدف بنجاح");
}
}
