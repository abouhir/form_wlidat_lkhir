@extends('layouts.right-menu' , [
   "page_name" => "رب الأسرة" , 
   "action" => "show" , 
   "search" => false ,
   "page_active" => "responsable" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])
@section('content')
<div class="container py-4">
<div class="card text-center">
    <div class="card-header fw-bold fs-3 text-show show-hd-ft-clr">
        {{$responsable->name}}
    </div>
    <div class="card-body">
      <h5 class="card-title fs-4 text-show"><span class="text-lbl">رقم البطاقة الوطنية:</span> {{$responsable->cin}}   </h5>
      <p class="card-text fs-4 text-show"><span class="text-lbl">العنوان  :</span> {{$responsable->adresse}}</p>
      <p class="card-text fs-4 text-show"><span class="text-lbl">الحالة الإجتماعية  :</span> {{$responsable->situation}}</p>
      <a href="{{route("responsable.edit",$responsable->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
      <form action="{{route("responsable.delete",$responsable->mot)}}" method="post" style="display : inline">
        @csrf
        @method("DELETE")
      <button type="submit" class="card-link text-danger btn"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
     </form>
    </div>
    <div class="card-footer show-hd-ft-clr text-muted ">
     <span class="text-danger text-uppercase">{{$responsable->user->name}}</span> / {{$responsable->created_at->format('Y-m-d')}}
    </div>
  </div>
</div>
@endsection