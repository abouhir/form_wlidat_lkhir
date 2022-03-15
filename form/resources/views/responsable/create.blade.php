@extends('layouts.right-menu' , [
   "page_name" => "رب الأسرة" , 
   "action" => "add" , 
   "search" => false,
   "page_active" => "responsable" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])

@section('content')


<div class="container scrollbar">
   <form action="{{route('responsable.store')}}" method="post">
    @csrf 
    @method("POST")
    <div class="row mt-3"> 
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="name" id="name" class="form-control input-form keyboardInput " placeholder="إسم رب الأسرة(*)   "  required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="cin" id="cin" class="form-control input-form " placeholder="رقم البطاقة الوطنية(*)"  required />
        </div>
        </div>
    </div>
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
            <div class="col-md-5 col-10 ">
                <select name="situation" id="situation" class="form-select input-form " required>
                    <option value="" disabled selected>الحالة الإجتماعية(*)</option>
                    <option   value="متزوج"   >    متزوج                 </option>
                    <option value="عازب">عازب</option>
                    <option value="وحيد">وحيد</option>
                </select>
            </div>
            </div>
        </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="adresse" id="adresse" class="form-control input-form keyboardInput" placeholder="العنوان(*)"   required />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
          <input type="text" dir="rtl" name="telephone" id="telephone" class="form-control input-form" placeholder="الهاتف(*)" pattern="[0-9]+"  required />
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
