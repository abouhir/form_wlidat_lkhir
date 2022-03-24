@extends('layouts.right-menu' , [
   "page_name" =>"الأفراد" , 
   "action" => "show" , 
   "search" => true,
   "page_active" => "personne" , 
   "lien_show" => "personne.index",
   "lien_create" => "personne.create"
])

@section('content')
<div class="container scrollbar py-4"> 
    @if (count($personnes)>0)
        
   
    <div class="col-12 pb-5">
    <div class="d-flex justify-content-center">
       
        <table class="table table-striped table-bordered text-break text-show ">
            <thead class="table-head text-center ">
                <th class="col">الإسم</th>
                <th class="col">رب الأسرة</th>
                <th class="col">المشرف</th>
                <th class="col">العملية</th>
            </thead>
            <tbody>
                @foreach ($personnes as $item)
                    <tr class="text-center">
                    <td>{{$item->name}}</td>
                    <td>{{$item->responsable->name}}</td>
                    <td>{{$item->responsable->user->name}}</td>
                    <td>      
                        <a href="{{route("personne.edit",$item->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
                        <form action="{{route("personne.delete",$item->mot)}}" method="post" class="frm" style="display : inline">
                          @csrf
                          @method("DELETE")
                        <button type="button" class="card-link text-danger btn btnsubmit"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
                       </form>
                       <a href="{{route("personne.show",$item->mot)}}" class="card-link text-info"><i class="fa-solid fa-eye fa-lg"></i></a>
                    </td>
                    </tr>
                @endforeach
                
            </tbody>
            <tfoot class="table-head text-center ">
                <th class="col">الإسم</th>
                <th class="col">رب الأسرة</th>
                <th class="col">المشرف</th>
                <th class="col">العملية</th>
            </tfoot>

        </table>
    </div>
    </div>
    @else 
<div class="offset-md-3 col-md-6 col-12">
  <div class="d-flex justify-content-center">
      <figure>                
          <img src="{{asset("images/no-data.png")}}" class="img-fluid"  alt="no data" />
      <figcaption class="text-center text-muted pb-5">لا توجد أي بيانات</figcaption>
      </figure>
  </div>
</div>
@endif
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
