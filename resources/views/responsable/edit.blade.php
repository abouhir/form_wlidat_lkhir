@extends('layouts.right-menu' , [
   "page_name" => "رب الأسرة" , 
   "action" => "update" , 
   "search" => false,
   "page_active" => "responsable" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])

@section('content')


<div class="container scrollbar">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach.
    @endif
   <form  action="{{route('responsable.update',$responsable->mot)}}" method="post" id="frm" enctype="multipart/form-data" >
    @csrf 
    @method("PUT")
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="name" value="{{$responsable->name}}" id="name" class="form-control input-form keyboardInput " placeholder="إسم رب الأسرة(*)   "  required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="cin" id="cin" value="{{$responsable->cin}}" class="form-control input-form " placeholder="رقم البطاقة الوطنية(*)"  required />
        </div>
        </div>
    </div>

    <div class="row mt-3"> 
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="number" value="{{$responsable->age}}" dir="rtl" name="age" id="age" min="10"  class="form-control input-form number-rtl" placeholder="السن (*)   "  required />
        </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="d-flex justify-content-center">
      <div class="col-md-5 col-10 ">
             <select name="handicape" id="handicap" class="form-select input-form " required>
                <option value="{{$responsable->handicape}}" selected><--  {{$responsable->handicape}}--></option>
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
                <option value="@php echo  $responsable->type_handicap =="0" ? "لاتوجد أي إعاقة" :  $responsable->type_handicap @endphp"  selected> <--@php echo  $responsable->type_handicap =="0" ? "لاتوجد أي إعاقة" :  $responsable->type_handicap @endphp--> <option>
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
                <select name="situation" id="situation" class="form-select input-form " required>
                    <option value="{{$responsable->situation}}" ><--{{$responsable->situation}}--></option>
                    <option   value="متزوج"   >    متزوج                 </option>
                    <option value="عازب">عازب</option>
                    <option value="أرمل(ة)">أرمل(ة)</option>
                </select>
            </div>
            </div>
        </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="adresse" id="adresse" value="{{$responsable->adresse}}" class="form-control input-form keyboardInput" placeholder="العنوان(*)"   required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
          <input type="text" dir="rtl" name="telephone" id="telephone" value="{{$responsable->telephone}}" class="form-control input-form" placeholder="الهاتف(*)" pattern="[0-9]+"  required />
        </div>
        </div>
    </div>
    <div class="row mt-3" id="image-content" >
        <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <img width="100%" height="200px" class="img-fluide" id="cin_img_recto"  src=@php echo (empty($responsable->cin_image_recto) ? asset('images/cin_verso.jpg') : asset('storage/cin_images/'.$responsable->cin_image_recto))   @endphp class="mt-3" />
            </div>
        </div>
    </div>

    <div class="row mt-3" >
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <label for="cin_image_recto" class="btn btn-form d-grid">صورة البطاقة وجه الوطنية</label>
            <input type="file" name="cin_image_recto" onchange="previewPictureRecto(this)" id="cin_image_recto" class="form-control input-form "  hidden />
        </div>
        </div>
    </div>

    
    <div class="row mt-3" id="image-content" >
        <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <img width="100%" height="200px" class="img-fluide" id="cin_img_verso"   src=@php echo (empty($responsable->cin_image_verso) ? asset('images/cin_verso.jpg') : asset('storage/cin_images/'.$responsable->cin_image_verso))   @endphp  class="mt-3" />
            </div>
        </div>
    </div>

    <div class="row mt-3" >
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <label for="cin_image_verso" class="btn btn-form d-grid">صورة ضهر البطاقة الوطنية</label>
            <input type="file" name="cin_image_verso" onchange="previewPictureVerso(this)" id="cin_image_verso" class="form-control input-form "   hidden />
        </div>
        </div>
    </div>
    
    
    
    <div class="row mt-3 pb-5 mb-5">
        <div class="d-flex justify-content-center">
        <div class="col-md-2 col-10 ">
            <input type="button"  name="btnsubmit" id="btnsubmit" class="btn  d-grid col-12 btn-form" value="تحديث"  />
        </div>
        </div>
    </div>


    
</div>
</form>
 @if(Session::get('message'))
    <script >
      alertSuccess("{!!Session::get('message')!!}")
    </script>
@endif

<script>
    var submit = document.getElementById("btnsubmit");
    var form = document.getElementById("frm");
    alertUpdate(submit,form);

    var imageRecto = document.getElementById("cin_img_recto");
    var types = ["image/jpg", "image/jpeg", "image/png"];
    // La fonction previewPicture
    var previewPictureRecto  = function (e) {

        // e.files contient un objet FileList
        const [picture] = e.files

        // "picture" est un objet File
        if (types.includes(picture.type)) {
            // On change l'URL de l'image
            imageRecto.src = URL.createObjectURL(picture);
            
        }
       
    } 


    var imageVerso = document.getElementById("cin_img_verso");
 
    // La fonction previewPicture
    var previewPictureVerso  = function (e) {

        // e.files contient un objet FileList
        const [picture] = e.files

        // "picture" est un objet File
        if (types.includes(picture.type)) {
            // On change l'URL de l'image
            imageVerso.src = URL.createObjectURL(picture);
           
        }
       
    } 



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


