@extends('layouts.right-menu' , [
   "page_name" => "الأفراد" , 
   "action" => "show" , 
   "search" => false ,
   "page_active" => "enfant" , 
   "lien_show" => "enfant.index",
   "lien_create" => "enfant.create"
])
@section('content')
<div class="container scrollbar py-4">
<div class="card text-center">
    <div class="card-header fw-bold fs-3 text-show show-hd-ft-clr">
       <i class="fa-solid fa-child fa-lg"></i>  {{$enfant->name}}
    </div>
    <div class="card-body">
      <h5 class="card-title fs-4 text-show"><span class="text-lbl">رب االأسرة  :</span> {{$enfant->responsable->name}}   </h5>
      <p class="card-text fs-4 text-show"><span class="text-lbl">قياس الملابس  :</span> {{$enfant->taille_vtm}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl"> قياس الحداء :</span> {{$enfant->taille_chaussure}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl">  المستوى الدراسي :</span> {{$enfant->niveaux_etd}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl">  معدل الأسدس الأول  :</span> {{$enfant->moyenne_s1}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl">  معدل الأسدس الثاني  :</span> {{$enfant->moyenne_s2}}</p>
      <a href="{{route("enfant.edit",$enfant->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
      <form action="{{route("enfant.delete",$enfant->mot)}}" method="post" id="frm" style="display : inline">
        @csrf
        @method("DELETE")
      <button type="button" id="btnsubmit" class="card-link text-danger btn"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
     </form>
    </div>
    <div class="card-footer show-hd-ft-clr text-muted ">
     <span class="text-danger text-uppercase">{{$enfant->user->name}}</span> / {{$enfant->created_at->format('Y-m-d')}}
    </div>
  </div>
</div>

<script>
  var submit = document.getElementById("btnsubmit");
  var form = document.getElementById("frm");
    alertDelete(submit,form);
  </script>
@endsection