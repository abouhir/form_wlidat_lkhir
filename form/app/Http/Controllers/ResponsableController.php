<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ResponsableController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $responsables = Auth::user()->responsables;
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
            "telephone" => "required"
        ]);

       $responsable= Responsable::create([
            "name" => $request->name , 
            "cin" => $request->cin , 
            "situation" => $request->situation , 
            "adresse" => $request->adresse , 
            "telephone" => $request->telephone , 
            "user_id" => Auth::id() ,
            "mot" => Crypt::encryptString($request->name."".$request->cin),
        ]);

        return redirect()->route("responsable.index")->with("message","تم الإنشاء بنجاح");

    }

    
    public function edit($mot)
    {
        $responsable = Responsable::all()->where("mot",$mot)->first();

        return view("responsable.edit")->with("responsable",$responsable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$mot)
    {
        $responsable = Responsable::all()->where("mot",$mot)->first();
        $validated = $request->validate([
            "name" => "required|max:255" , 
            "cin" => "required" , 
            "situation" => "required" , 
            "adresse" => "required" , 
            "telephone" => "required"
        ]);

       $responsable->name = $request->name ; 
            
        $responsable->cin = $request->cin ;
        $responsable->situation = $request->situation ;
        $responsable->adresse= $request->adresse ;
        $responsable->telephone = $request->telephone ;
            
       
        $responsable->save();

        return redirect()->back();
    }

    public function search(Request $request){
        $responsables = Auth::user()->responsables->where("cin",$request->cin);
        
        return view("responsable.index")->with("responsables",$responsables);
    }

    public function destroy($mot)
    {
        $responsable = Responsable::all()->where("mot",$mot)->first()->delete();
        return redirect()->route("responsable.index");
    }
}
