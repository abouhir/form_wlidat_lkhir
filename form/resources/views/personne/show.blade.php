@extends('layouts.right-menu' , [
   "page_name" => "الأفراد" , 
   "action" => "show" , 
   "search" => true ,
   "page_active" => "personne" , 
   "lien_show" => "personne.index",
   "lien_create" => "personne.create"
])
@section('content')
<div class="container scrollbar ">
<div class="card text-center mb-5">
    <div class="card-header fw-bold fs-3 text-show show-hd-ft-clr">
       <i class="fa-solid fa-person fa-lg"></i>  {{$personne->name}}
    </div>
    <div class="card-body">
      <h5 class="card-title fs-4 text-show"><span class="text-lbl">رب االأسرة  :</span> {{$personne->responsable->name}}   </h5>
      <p class="card-text fs-4 text-show"><span class="text-lbl">عامل  :</span> {{$personne->fonctionnelle}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl"> المهاراة :</span> {{$personne->competences}}</p>
      <a href="{{route("personne.edit",$personne->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
      <form action="{{route("personne.delete",$personne->mot)}}" method="post" id="frm" style="display : inline">
        @csrf
        @method("DELETE")
      <button type="button" name="btnsubmit" id="btnsubmit" class="card-link text-danger btn"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
     </form>
    </div>
    <div class="card-footer show-hd-ft-clr text-muted ">
     <span class="text-danger text-uppercase">{{$personne->user->name}}</span> / {{$personne->created_at->format('Y-m-d')}}
    </div>
  </div>
</div>

<script>
var submit = document.getElementById("btnsubmit");
var form = document.getElementById("frm");
  alertDelete(submit,form);
</script>

@endsection