@extends('layouts.right-menu' , [
   "page_name" => "الأطفال" , 
   "action" => "show" , 
   "search" => true,
   "page_active" => "enfant" , 
   "lien_show" => "enfant.index",
   "lien_create" => "enfant.create"
])

@section('content')
<div class="container scrollbar"> 
    <div class="col-12">
    <div class="d-flex justify-content-center">
       
        <table class="table table-striped table-bordered">
            <thead class="table-head text-center ">
                <th class="col">الإسم</th>
                <th class="col">رب الأسرة</th>
                <th class="col">المشرف</th>
                <th class="col">العملية</th>
            </thead>
            <tbody>
                @foreach ($enfants as $item)
                    <tr class="text-center">
                    <td>{{$item->name}}</td>
                    <td>{{$item->responsable->name}}</td>
                    <td>{{$item->user->name}}</td>
                   
                    <td>      
                        <a href="{{route("enfant.edit",$item->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
                        <form action="{{route("enfant.delete",$item->mot)}}" method="post" class="frm" style="display : inline">
                          @csrf
                          @method("DELETE")
                        <button type="button" class="card-link text-danger btn btnsubmit"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
                       </form>
                       <a href="{{route("enfant.show",$item->mot)}}" class="card-link text-info"><i class="fa-solid fa-eye fa-lg"></i></a></td>
                    </tr>
                @endforeach
                
            </tbody>

        </table>
    </div>
    </div>
</div>
@if(Session::get('message'))
    <script >
      alertSuccess("{!!Session::get('message')!!}")
    </script>
@endif

<script>
    var submit = document.getElementsByClassName("btnsubmit");
    var forms = document.getElementsByClassName("frm");
  
    for(var i=0 ; i<forms.length ; i++){
      alertDelete(submit[i],forms[i]);
    }
</script>
@endsection