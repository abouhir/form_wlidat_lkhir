@extends('layouts.right-menu' , [
   "page_name" => "الصفحة الرئسية" , 
   "action" => "show" , 
   "search" => false ,
   "page_active" => "home" , 
   
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])
@section('content')

<div class="container scrollbar py-4  me-3 pe-1" id="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center ">
                <img width="100px" src="{{asset('images/wlidat-lkhir.jpg')}}" class="rounded-circle" alt="logo wlidat lkhir" />
           
            </div>
        </div>
    </div>
    <!--      رب الأسرة  -->
    <div class="row">
        <div class="col-12 ">
           <span class="fs-4 fw-bold text-show ">   رب الأسرة </span>
        </div>
    </div>
    <hr>
   
        
    <div class="row">
        <div class="col-md-6 col-12">
             <label class="fs-5 fw-bold text-show text-lbl"> الإسم:</label>
            <span class="text-show fs-5"> {{$responsable->name}} </span>
        </div>
        <div class="col-md-6 col-12 mt-md-0 mt-3">
            <label class="text-show text-lbl fs-5 fw-bold">رقم البطاقة الوطنية :</label>
           <span class="text-show fs-5"> {{$responsable->cin}}</span>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6 col-12">
             <label class="fs-5 fw-bold text-show text-lbl"> من دوي الإحتياجات الخاصة :</label>
            <span class="text-show fs-5"> {{$responsable->handicape}} </span>
        </div>
        @if ($responsable->type_handicap!="0")
        <div class="col-md-6 col-12 mt-md-0 mt-3">
            <label class="text-show text-lbl fs-5 fw-bold">نوع الإعاقة    :</label>
           <span class="text-show fs-5"> {{$responsable->type_handicap}}</span>
        </div>
        @endif
    </div>
   
    <div class="row mt-3">
        <div class="col-12">
            <label class="fs-5 fw-bold text-lbl text-show">  العنوان :</label>
           <span class="text-show fs-5"> {{$responsable->adresse}}</span>
        </div> 
    </div>

    <div class="row mt-4">
        
        <div class="col-md-6 col-12">
             <label class="fs-5 fw-bold text-lbl text-show">الحالة الإجتماعية :</label>
           <span class="text-show fs-5">  {{$responsable->situation}}</span>
        </div>
        <div class="col-md-6 col-12  mt-md-0 mt-3">
            <label class="fs-5 fw-bold text-lbl text-show"> الهاتف :</label>
           <span class="text-show fs-5"> {{$responsable->telephone}}</span>
        </div>
      
    </div>
    <div class="row mt-4">
        <label class="fs-5 fw-bold text-lbl text-show">  البطاقة الوطنية:</label>
        
    </div>

    <div class="row mt-4 me-md-5 ms-0">
       
        <div class="col-md-6 col-12 ">
            <img width="50%" height="200px" class="col-12   img-fluide" id="img-profile"  src="{{asset('storage/cin_images/'.$responsable->cin_image_recto)}}"  />
             
        </div>
        <div class="col-md-6 col-12">
            <img width="50%" height="200px" class=" col-12 mt-2 img-fluide" id="img-profile"  src="{{asset('storage/cin_images/'.$responsable->cin_image_verso)}}"  />
        </div>
    </div>
  
    

<!--  الأفراد      : -->
<div class="row mt-5">
    <div class="col-12 ">
       <span class="fs-4 fw-bold text-show "> الأفراد </span>
    </div>
</div>
<hr>
@foreach ($responsable->personnes as $item)
    

<div class="row">
    <div class="col-6">
         <label class="fs-5 fw-bold text-show text-lbl"> الإسم:</label>
         <span class="text-show fs-5">{{$item->name}}</span>
    </div>
    <div class="col-6">
        <label class="fs-5 fw-bold text-show text-lbl"> عامل :</label>
        <span class="text-show fs-5">{{$item->fonctionnelle}}</span>
   </div>
   
</div>
<div class="row mt-3">
    <div class="col-11">
        <label class="text-show text-lbl fs-5 fw-bold  ">المهارات :</label>
        <span class="text-show fs-5 text-justify text-break ">{{$item->competences}}</span>
    </div>
</div>
<hr>
@endforeach
<!--  الأطفال      : -->

    

<div class="row mt-5">
    <div class="col-12 ">
       <span class="fs-4 fw-bold text-show ">   الأطفال  </span>
       <span class="text-show fs-5"></span>
    </div>
</div>
<hr>
@foreach ($responsable->enfants as $item)

<div class="row">
    <div class="col-md-6 col-12">
         <label class="fs-5 fw-bold text-show text-lbl"> الإسم:</label>
         <span class="text-show fs-5">{{$item->name}}</span>
    </div>
    <div class="col-md-6 col-12 mt-md-0 mt-3">
        <label class="text-show text-lbl fs-5 fw-bold">   قياس الملابس :</label>
        <span class="text-show fs-5"> {{$item->taille_vtm}}</span>
    </div>
</div>

<div class="row mt-4 mb-5">
    <div class="col-md-6 col-12">
        <label class="fs-5 fw-bold text-lbl text-show">  قياس الحداء :</label>
        <span class="text-show fs-5">{{$item->taille_chaussure}}</span>
    </div>
    <div class="col-md-6 col-12 mt-3">
         <label class="fs-5 fw-bold text-lbl text-show">المستوى الدراسي  :</label>
         <span class="text-show fs-5">{{$item->niveaux_etd}}</span>
    </div>
    <div class="col-md-6 col-12 mt-3">
        <label class="fs-5 fw-bold text-lbl text-show"> معدل الأسدس الأول :</label>
        <span class="text-show fs-5">{{$item->moyenne_s1}}</span>
    </div>
    <div class="col-md-6 col-12 mt-3 mb-2">
        <label class="fs-5 fw-bold text-lbl text-show"> معدل الأسدس الثاني :</label>
        <span class="text-show fs-5">{{$item->moyenne_s2}}</span>
    </div>
  <hr>
</div>
@endforeach
<div class="text-center" id="backdrop" style="display: none">
    <div class="spinner-border spinner" role="status" id="spinner"  >
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
<div class="row mb-5">
    <div class="offset-md-3 col-md-4 offset-2 col-8">
        
            <a href="{{route("home.imprimer",$responsable->mot)}}" id="imprimer" class="btn btn-danger d-grid text-show mb-5 " style="display : inline"><i class="fa-solid fa-print fa-lg mt-2"></i> <span class="mt-2 fs-5">تحميل</span></a>
        
    </div>
</div>
</div>

<script>
    var imprimer = document.getElementById('imprimer');
    var spinner = document.getElementById('backdrop');
    var body = document.getElementById('body');

    imprimer.addEventListener("click",function(e){
        spinner.style.display="inline";
        //body.style.backgroundColor = "black";
        body.disabled=true;
        body.style.zIndex = "10050";
        
    });
</script>


@endsection