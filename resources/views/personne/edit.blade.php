@extends('layouts.right-menu' , [
   "page_name" =>"الأفراد" , 
   "action" => "update" , 
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
   <form action="{{route('personne.update',$personne->mot)}}" id="frm" method="post">
    @csrf 
    @method("PUT")

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <select name="responsable" id="responsable" class="form-select input-form " required>
                <option value="{{$personne->responsable_id}}"  selected><--{{$personne->responsable->name}}--></option>
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
            <input type="text" name="name" id="name" value="{{$personne->name}}" class="form-control input-form keyboardInput " placeholder="إسم الفرد(*)   "  required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <select name="fonctionnelle" id="fonctionnelle" class="form-select input-form ">
                <option value="{{$personne->fonctionnelle}}" selected><--{{$personne->fonctionnelle}}--></option>
                    <option   value="نعم">نعم</option>
                    <option value="لا">لا</option>
                    
            </select>
           
        </div>
        </div>

        <div class="row mt-3"> 
            <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <input type="number" value="{{$personne->age}}" dir="rtl" name="age" id="age" min="10"  class="form-control input-form number-rtl" placeholder="السن (*)   "  required />
            </div>
            </div>
        </div>
    
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
          <div class="col-md-5 col-10 ">
                 <select name="handicape" id="handicap" class="form-select input-form " required>
                    <option value="{{$personne->handicape}}" selected><--  {{$personne->handicape}}--></option>
                    <option   value="نعم"   >    نعم   </option>
                    <option value="لا">لا</option>
                  
                </select>
                
            </div>
            </div>
        </div>
    
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
          <div class="col-md-5 col-10">
                 <select name="type_handicap" id="type-handicap" class="form-select input-form"   disabled>
                    <option value="@php echo  $personne->type_handicap =="0" ? "لاتوجد أي إعاقة" :  $personne->type_handicap @endphp"  selected> <--@php echo  $personne->type_handicap =="0" ? "لاتوجد أي إعاقة" :  $personne->type_handicap @endphp--> <option>
                    <option value="الإعاقة البصرية"   >         الإعاقة البصرية            </option>
                    <option value="الإعاقة السمعية">الإعاقة السمعية</option>
                    <option value="الإعاقة الجسمية والحركية ">الإعاقة الجسمية والحركية </option>
                    <option value="صعوبات التعلم ">صعوبات التعلم </option>
                    <option value="اضطرابات النطق والكلام ">اضطرابات النطق والكلام </option>
                    <option value="الاضطرابات السلوكية والانفعالية ">الاضطرابات السلوكية والانفعالية </option>
                    <option value="التوحد   ">التوحد   </option>
                    <option value=" الإعاقات المزدوجة والمتعددة">الإعاقات المزدوجة والمتعددة </option>
                </select>
                
            </div>
            </div>
        </div>
    </div>
        <div class="row mt-3">  
            <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <textarea name="competences" id="competences"  class="form-control input-form keyboardInput " placeholder="المهارات" >{{$personne->competences}}</textarea>
            </div>
            </div>
        </div>
    
   
    
    
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-2 col-10 ">
            <input type="button" name="btnsubmit" id="btnsubmit" class="btn  d-grid col-12 btn-form" value="تحديث"  />
        </div>
        </div>
    </div>
    

</form>
    
</div>

@if(Session::get('message'))
    <script >
      alertSuccess("{!!Session::get('message')!!}")
    </script>
@endif

<script>
    var submit = document.getElementById("btnsubmit");
    var form = document.getElementById("frm");
    alertUpdate(submit,form);








    var handicap = document.getElementById('handicap');
    var typeHandicap = document.getElementById('type-handicap');

    if(handicap.value=='نعم'){
            console.log("oui");
            typeHandicap.disabled=false;
            typeHandicap.required=true;

        }else{
            console.log("non");
            typeHandicap.disabled=true;
            typeHandicap.required=false;
        }
    
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
