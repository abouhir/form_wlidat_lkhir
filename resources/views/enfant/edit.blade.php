@extends('layouts.right-menu' , [
   "page_name" => "الأطفال" , 
   "action" => "update" , 
   "search" => false,
   "page_active" => "enfant" , 
   "lien_show" => "enfant.index",
   "lien_create" => "enfant.create"
])

@section('content')


<div class="container scrollbar">

    <div>
        @foreach ($errors->all() as $item)
            {{$item}}
        @endforeach
    </div>
   <form action="{{route('enfant.update',$enfant->mot)}}" id="frm" method="post">
    @csrf 
    @method("PUT")

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <select name="responsable" id="responsable" class="input-form form-select  " required>
                <option value="{{$enfant->responsable->id}}"  selected><--{{$enfant->responsable->name}}--></option>
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
            <input type="text" name="name" value="{{$enfant->name}}"  id="name" class="form-control input-form keyboardInput " placeholder="إسم الطفل(*)"  required />
        </div>
        </div>
    </div>

    <div class="row mt-3"> 
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="number" value="{{$enfant->age}}" dir="rtl" name="age" id="age" min="10"  class="form-control input-form number-rtl" placeholder="السن (*)   "  required />
        </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
      <div class="col-md-5 col-10 ">
             <select name="handicape" id="handicap" class="form-select input-form " required>
                <option value="{{$enfant->handicape}}" selected><--  {{$enfant->handicape}}--></option>
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
                <option value="@php echo  $enfant->type_handicap =="0" ? "لاتوجد أي إعاقة" :  $enfant->type_handicap @endphp"  selected> <--@php echo  $enfant->type_handicap =="0" ? "لاتوجد أي إعاقة" :  $enfant->type_handicap @endphp--> <option>
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
    
    
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <select name="taille_vtm" id="taille_vtm" class="form-select input-form " required>
                    <option value="{{$enfant->taille_vtm}}" selected><--{{$enfant->taille_vtm}}--></option>
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
              <input class="form-control input-form number-rtl"  value="{{$enfant->taille_chaussure}}" type="number" step="0.5" min="0"  name="taille_chaussure" id="taille_chaussure" placeholder="قياس الحداء" required />
            </div>
            </div>
        </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="niveaux_etd" id="niveaux_etd" value="{{$enfant->niveaux_etd}}"   class="form-control input-form keyboardInput" placeholder="المستوى الدراسي(*)"   required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input class="form-control input-form number-rtl" type="number" step="0.01" min="0" max="20" value="{{$enfant->moyenne_s1}}" name="moyenne_s1" id="moyenne_s1" placeholder="معدل الأسدس الأول(*)" required />
        </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input class="form-control input-form number-rtl" type="number" step="0.01" min="0" max="20" value="{{$enfant->moyenne_s2}}" name="moyenne_s2" id="moyenne_s2" placeholder="معدل الأسدس الأول(*)" required />
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