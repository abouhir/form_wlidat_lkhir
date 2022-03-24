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
                <option value="" disabled selected>رب الأسرة (*)</option>
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
            <input type="text" name="name" id="name" class="form-control input-form keyboardInput " placeholder="إسم الفرد (*)   "  required />
        </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="number" name="age" id="age" class="form-control input-form number-rtl " placeholder=" (*) السن "  required />
        </div>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
      <div class="col-md-5 col-10 ">
             <select name="handicape" id="handicap" class="form-select input-form " required>
                <option value="" disabled selected>من دوي الإحتياجات الخاصة  (*)</option>
                <option   value="نعم">نعم</option>
                <option value="لا">لا</option>
              
            </select>
            
        </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
      <div class="col-md-5 col-10">
             <select name="type_handicap" id="type-handicap" class="form-select input-form"   disabled>
                <option value="0" disabled selected>نوع الإعاقة (*)</option>
                <option   value="الإعاقة البصرية">الإعاقة البصرية</option>
                <option value="الإعاقة السمعية">الإعاقة السمعية</option>
                <option value="الإعاقة الجسمية والحركية ">الإعاقة الجسمية والحركية </option>
                <option value="صعوبات التعلم ">صعوبات التعلم </option>
                <option value="اضطرابات النطق والكلام">اضطرابات النطق والكلام</option>
                <option value="الاضطرابات السلوكية والانفعالية">الاضطرابات السلوكية والانفعالية</option>
                <option value="التوحد">التوحد</option>
                <option value=" الإعاقات المزدوجة والمتعددة">الإعاقات المزدوجة والمتعددة</option>
            </select>
            
        </div>
        </div>
    </div>

    
    
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <select name="fonctionnelle" id="fonctionnelle" class="form-select input-form ">
                <option value="" disabled selected>عامل (*)</option>
                    <option   value="نعم">نعم</option>
                    <option value="لا">لا</option>
                    
            </select>
           
        </div>
        </div>
    </div>
        <div class="row mt-3">  
            <div class="d-flex justify-content-center">
                <div class="col-md-5 col-10 ">
                    <textarea name="competences" id="competences"  class="form-control input-form keyboardInput " placeholder="المهارات (*)" ></textarea>
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


<script>
    var handicap = document.getElementById('handicap');
    var typeHandicap = document.getElementById('type-handicap');
    
    handicap.addEventListener('change',function(e){  
   
        if(e.target.value=='نعم'){
            console.log("oui");
            typeHandicap.disabled=false;
            typeHandicap.required=true;

        }else{
            console.log("non");
            typeHandicap.disabled=true;
            typeHandicap.required=false;
        }
    });
</script>
@endsection
