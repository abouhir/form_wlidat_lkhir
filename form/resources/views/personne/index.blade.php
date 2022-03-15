@extends('layouts.right-menu' , [
   "page_name" =>"الأفراد" , 
   "action" => "show" , 
   "search" => true,
   "page_active" => "personne" , 
   "lien_show" => "personne.index",
   "lien_create" => "personne.create"
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
                @foreach ($personnes as $item)
                    <tr class="text-center">
                    <td>{{$item->name}}</td>
                    <td>{{$item->responsable->name}}</td>
                    <td>{{$item->responsable->user->name}}</td>
                    <td>      
                        <a href="{{route("personne.edit",$item->mot)}}" class="card-link text-warning"><i class="fa-solid fa-pen fa-lg"></i></a>
                        <form action="{{route("personne.delete",$item->mot)}}" method="post" style="display : inline">
                          @csrf
                          @method("DELETE")
                        <button type="submit" class="card-link text-danger btn"><i class="fa-solid fa-trash-can fa-lg" ></i></button>
                       </form>
                       <a href="{{route("personne.show",$item->mot)}}" class="card-link text-info"><i class="fa-solid fa-eye fa-lg"></i></a>
                    </td>
                    </tr>
                @endforeach
                
            </tbody>

        </table>
    </div>
    </div>
</div>
@endsection
