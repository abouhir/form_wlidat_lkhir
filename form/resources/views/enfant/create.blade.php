@extends('layouts.right-menu' , [
   "page_name" => "الأطفال" , 
   "action" => "add" , 
   "search" => false,
   "page_active" => "enfant" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])

@section('content')


<div class="container scrollbar">

    <div>
        @foreach ($errors->all() as $item)
            {{$item}}
        @endforeach
    </div>
   <form action="{{route('enfant.store')}}" method="post">
    @csrf 
    @method("POSt")

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <select name="responsable" id="responsable" class="input-form form-select  " required>
                <option value="" disabled selected>رب الأسرة</option>
                @foreach ($responsables as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                    
            </select>
           
        </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="name"  id="name" class="form-control input-form keyboardInput " placeholder="إسم الطفل(*)"  required />
        </div>
        </div>
    </div>
    
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <select name="taille_vtm" id="taille_vtm" class="form-select input-form " required>
                    <option value="" disabled selected>قياس الملابس</option>
                    <option   value="S">S</option>
                    <option value="M">M</option>
                    <option value="XL">XL</option>
                </select>
            </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
              <input class="form-control input-form number-rtl"  type="number"  name="taille_chaussure" id="taille_chaussure" placeholder="قياس الحداء" required />
            </div>
            </div>
        </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="niveaux_etd" id="niveaux_etd"  class="form-control input-form keyboardInput" placeholder="المستوى الدراسي(*)"   required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input class="form-control input-form number-rtl" type="number" name="moyenne_s1" id="moyenne_s1" placeholder="معدل الأسدس الأول(*)" required />
        </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input class="form-control input-form number-rtl" type="number" name="moyenne_s2" id="moyenne_s2" placeholder="معدل الأسدس الأول(*)" required />
        </div>
        </div>
    </div>
    
    
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-2 col-10 ">
            <input type="submit" name="submit" id="submit" class="btn  d-grid col-12 btn-form" value="إنشاء"  />
        </div>
        </div>
    </div>
    

</form>
    
</div>
@endsection