@extends('layouts.right-menu' , [
   "page_name" => "رب الأسرة" , 
   "action" => "show" , 
   "search" => false ,
   "page_active" => "responsable" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])
@section('content')
<div class="container scrollbar py-4">
<div class="card text-center mb-5">
    <div class="card-header fw-bold fs-3 text-show show-hd-ft-clr">
        {{$responsable->name}}
    </div>
    <div class="card-body">
      
      
      <h5 class="card-title fs-4 text-show"><span class="text-lbl">رقم البطاقة الوطنية:</span> {{$responsable->cin}}   </h5>
      <p class="card-text fs-4 text-show"><span class="text-lbl"> السن   :</span> {{$responsable->age}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl">يعاني من إعاقة  :</span> {{$responsable->handicape}}</p>
      @if ($responsable->type_handicap!="0")
           <p class="card-text fs-4 text-show"><span class="text-lbl">  نوع الإعاقة  :</span> {{$responsable->type_handicap}}</p>
      @endif
     
      <p class="card-text fs-4 text-show"><span class="text-lbl text-break">العنوان  :</span> {{$responsable->adresse}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl">الحالة الإجتماعية  :</span> {{$responsable->situation}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl">   الهاتف:</span> {{$responsable->telephone}}</p>
      <p class="card-text text-show" >               
        <img width="50%" height="200px" class="col-md-6 col-12  img-fluide" id="img-profile"  src="{{asset('storage/cin_images/'.$responsable->cin_image_recto)}}"  />
        <img width="50%" height="200px" class="col-md-6 col-12 mt-2 img-fluide" id="img-profile"  src="{{asset('storage/cin_images/'.$responsable->cin_image_verso)}}"  class="mt-3" />
      </p>
      <a href="{{route("responsable.edit",$responsable->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
      <form action="{{route("responsable.delete",$responsable->mot)}}" id="frm" method="post" style="display : inline">
        @csrf
        @method("DELETE")
      <button type="button" id="btnsubmit" class="card-link text-danger btn"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
     </form>
    </div>
    <div class="card-footer show-hd-ft-clr text-muted ">
     <span class="text-danger text-uppercase">{{$responsable->user->name}}</span> / {{$responsable->created_at->format('Y-m-d')}}
    </div>
  </div>
</div>



<script>
  var submit = document.getElementById("btnsubmit");
  var form = document.getElementById("frm");
    alertDelete(submit,form);
</script>
@endsection