@extends('layouts.right-menu' , [
   "page_name" => "الصفحة الرئيسية" , 
   "action" => "" , 
   "search" => false,
   "page_active" => "home" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])

@section('content')

<div class="container  scrollbar mb-5">
    <div class="row ms-2  py-4 mb-5 pb-5">
        @if (count($responsables)>0)
            
        
        @foreach ($responsables as $item) 
      
        <div class="col-md-4 col-12 mt-md-0 mt-2 mb-3">
            <div class="card home-card text-center"  style="height: 280px">
                <div class="card-body">
                  <h5 class="card-title text-show fw-bold fs-4"><i class="fa-solid fa-user-shield fa-lg"></i> {{$item->name}}</h5>
                  <p class="card-text fs-5 text-show  "><i class="fa-solid fa-child fa-lg text-lbl"></i> <span class="text-lbl"> عدد الأطفال :</span> {{$item->enfants->count()}}</p>
                  <p class="card-text fs-5 text-show  "><i class="fa-solid fa-person fa-lg text-lbl"></i> <span class="text-lbl">عدد الأفراد :</span> {{$item->personnes->count()}}</p>
                  <p class="card-text fs-5 text-show  "><i class="fa-solid fa-users text-lbl"></i> <span class="text-lbl">المجموع  :</span> {{$item->personnes->count()+$item->enfants->count()+1}}</p>
                  <p class="card-text fs-5 text-show  "><i class="fa-solid fa-user-check text-lbl"></i> <span class="text-lbl">المشرف  :</span> {{$item->user->name}}</p>
                  <a href="{{route("home.show",$item->mot)}}" class="card-link text-info fs-4 text-center"><i class="fa-solid fa-eye fa-lg"></i></a>
                </div>
            </div>
     </div>
    
        @endforeach

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
</div>
@endsection
