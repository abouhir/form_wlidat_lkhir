@extends('layouts.right-menu' , [
   "page_name" => "رب الأسرة" , 
   "action" => "show" , 
   "search" => true ,
   "page_active" => "responsable" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])

@section('content')

<div class="container scrollbar ">
    
@foreach ($responsables as $item)
<div class="row ms-2 mb-3 ">
        <div class="d-flex justify-content-center">
<div class="card col-12 mt-3" >
    <div class="card-body">
      <h5 class="card-title">{{$item->name}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Cin: {{$item->cin}} / Tel : {{$item->telephone}}</h6>
      <p class="card-text text-break">{{$item->adresse}}</p>
      <a href="{{route("responsable.edit",$item->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
      <form action="{{route("responsable.delete",$item->mot)}}" method="post" style="display : inline">
        @csrf
        @method("DELETE")
      <button type="submit" class="card-link text-danger btn"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
     </form>
     <a href="{{route("responsable.show",$item->mot)}}" class="card-link text-info"><i class="fa-solid fa-eye fa-lg"></i></a>
    </div>
  </div>
</div>
</div>

@endforeach



</div>
<script>
  
</script>
@endsection