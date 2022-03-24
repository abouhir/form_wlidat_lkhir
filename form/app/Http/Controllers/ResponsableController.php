<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use File;

class ResponsableController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(Auth::user()->role=='admin'){
            $responsables = Responsable::all();
           
        }else{
            $responsables = Auth::user()->responsables;
        }
        
        return view("responsable.index")->with("responsables",$responsables);
    }

    public function show($mot){
        $responsable = Responsable::all()->where("mot",$mot)->first();
        return view("responsable.show")->with("responsable",$responsable);
    }

    public function create()
    {
        return view("responsable.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|max:255" , 
            "cin" => "required" , 
            "situation" => "required" , 
            "adresse" => "required" , 
            "telephone" => "required" , 
            "cin_image_recto" => "image|mimes:jpeg,png,jpg" , 
            "cin_image_verso" => "image|mimes:jpeg,png,jpg",
            "handicape" => "required" , 
            "age"=> "required"
        ]);

        $input=$request->all();
        if($request->hasFile("cin_image_recto")){
            $destination_image ="/cin_images" ;
            $image = $request->file("cin_image_recto");
            $imageName = str_replace(" ","","cin_recto_".$request->name."_".$image->getClientOriginalName()) ;
            $request->file("cin_image_recto")->storeAs($destination_image,$imageName);
            $input['cin_image_recto'] = $imageName;
        }
        if($request->hasFile("cin_image_verso")){
            $destination_image ="/cin_images" ;
            $image = $request->file("cin_image_verso");
            $imageName = str_replace(" ","","cin_verso_".$request->name."_".$image->getClientOriginalName()) ;
            $request->file("cin_image_verso")->storeAs($destination_image,$imageName);
            $input['cin_image_verso'] = $imageName;
        } 
        if(empty($request->type_handicap)){
            $input['type_handicap'] = "0";
        }
        
        
       $responsable= Responsable::create([
            "name" => $request->name , 
            "cin" => $request->cin , 
            "situation" => $request->situation , 
            "adresse" => $request->adresse , 
            "telephone" => $request->telephone , 
            "user_id" => Auth::id() ,
            "cin_image_recto" => $input['cin_image_recto'] ,
            "cin_image_verso" => $input['cin_image_verso'] ,
            "age" => $request->age , 
            "handicape" => $request->handicape , 
            "type_handicap" =>  $input['type_handicap'],
            "mot" => Crypt::encryptString($request->name."".$request->cin),
        ]);

        return redirect()->route("responsable.index")->with("message","تم الإنشاء بنجاح");


    }

    
    public function edit($mot)
    {
        $responsable = Responsable::all()->where("mot",$mot)->first();

        return view("responsable.edit")->with("responsable",$responsable);
    }

    
    public function update(Request $request,$mot)
    {
        $responsable = Responsable::all()->where("mot",$mot)->first();
        $validated = $request->validate([
            "name" => "required|max:255" , 
            "cin" => "required" , 
            "situation" => "required" , 
            "adresse" => "required" , 
            "telephone" => "required" , 
            "cin_image_recto" => "image|mimes:jpeg,png,jpg" , 
            "cin_image_verso" => "image|mimes:jpeg,png,jpg" , 
            "handicape" => "required" , 
            "age"=> "required"
        ]);


        $input=$request->all();
        if($request->hasFile("cin_image_recto")){
            $destination_image ="/cin_images" ;
            $image = $request->file("cin_image_recto");
            if(file_exists(public_path("storage/cin_images/"."".$responsable->cin_image_recto))){
                unlink(public_path("storage/cin_images/"."".$responsable->cin_image_recto));
            }
            $imageName = str_replace(" ","","cin_".$request->name."_".$image->getClientOriginalName()) ;
            $request->file("cin_image_recto")->storeAs($destination_image,$imageName);
            $input['cin_image_recto'] = $imageName;
            $responsable->cin_image_recto =$input['cin_image_recto'];
        }

        if($request->hasFile("cin_image_verso")){
            $destination_image ="/cin_images" ;
            $image = $request->file("cin_image_verso");
            if(file_exists(public_path("storage/cin_images/"."".$responsable->cin_image_verso))){
                unlink(public_path("storage/cin_images/"."".$responsable->cin_image_verso   ));
            }
            $imageName = str_replace(" ","","cin_".$request->name."_".$image->getClientOriginalName()) ;
            $request->file("cin_image_verso")->storeAs($destination_image,$imageName);
            $input['cin_image_verso'] = $imageName;
            $responsable->cin_image_verso =$input['cin_image_verso'];
        }

        $responsable->name = $request->name ;    
        $responsable->cin = $request->cin ;
        $responsable->situation = $request->situation ;
        $responsable->adresse= $request->adresse ;
        $responsable->telephone = $request->telephone ;
        $responsable->handicape = $request->handicape ;
        if(empty($request->type_handicap )){
            $responsable->type_handicap = "0" ;
        }else{
            $responsable->type_handicap = $request->type_handicap ;
        }
        $responsable->age = $request->age ;
       
       
       
        $responsable->save();

        return redirect()->back()->with("message","تم التحديث بنجاح");
    }

    public function search(Request $request){
        if(empty($request->search)){
            return redirect()->route("responsable.index");
        }else{
            
            //$responsables = Auth::user()->responsables->where("cin","LIKE",$request->cin."%");
            if(Auth::user()->role=='admin'){
            $responsables = Responsable::join('users',function($join){
                $join->on('users.id', '=', 'responsables.user_id');
            })
            ->where('cin','LIKE',"%".$request->search."%")
            ->orWhere('responsables.name','LIKE',"%".$request->search."%")
            ->orWhere('adresse','LIKE',"%".$request->search."%")
            ->orWhere('users.name','LIKE',"%".$request->search."%")->get("responsables.*");
        }else{
            $responsables = Responsable::join('users',function($join){
                $join->on('users.id', '=', 'responsables.user_id');
            })
            ->where(function($query) use($request) {
            $query->where('responsables.user_id','=',Auth::id());
           
            })    
            ->where( function($query) use($request) {
            $query->where('responsables.name','LIKE',"%".$request->search."%")
            ->orWhere('adresse','LIKE',"%".$request->search."%")
            ->orWhere('cin','LIKE',"%".$request->search."%")
            ->orWhere('users.name','LIKE',"%".$request->search."%");
            })->get("responsables.*");
                
               
            
        }
           
            return view("responsable.index")->with("responsables",$responsables);
            
        }
        
        
       
    }

    public function destroy($mot)
    {
        $responsable = Responsable::all()->where("mot",$mot)->first();
        if(file_exists(public_path("storage/cin_images/"."".$responsable->cin_image_recto))){
            unlink(public_path("storage/cin_images/"."".$responsable->cin_image_recto));
        }
        if(file_exists(public_path("storage/cin_images/"."".$responsable->cin_image_verso))){
            unlink(public_path("storage/cin_images/"."".$responsable->cin_image_verso));
        }
        $responsable->delete();
        return redirect()->route("responsable.index")->with("message","تم الحدف بنجاح");
    }
}
