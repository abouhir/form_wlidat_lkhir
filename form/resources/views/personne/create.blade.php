@extends('layouts.right-menu' , [
   "page_name" =>"الأفراد" , 
   "action" => "add" , 
   "search" => false,
   "page_active" => "personne" , 
   "lien_show" => "personne.index",
   "lien_create" => "personne.create"
])

@section('content')


<div class="container scrollbar">
    <div>
        @foreach ($errors->all() as $item)
            {{$item}}
        @endforeach
    </div>
   <form action="{{route('personne.store')}}" method="post">
    @csrf 
    @method("POST")

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <select name="responsable" id="responsable" class="form-select input-form " required>
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
            <input type="text" name="name" id="name" class="form-control input-form keyboardInput " placeholder="إسم الفرد(*)   "  required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <select name="fonctionnelle" id="fonctionnelle" class="form-control input-form ">
                <option value="" disabled selected>عامل</option>
                    <option   value="نعم">نعم</option>
                    <option value="لا">لا</option>
                    
            </select>
           
        </div>
        </div>
    </div>
        <div class="row mt-3">  
            <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <textarea name="competences" id="competences"  class="form-control input-form keyboardInput " placeholder="المهاراة" ></textarea>
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
