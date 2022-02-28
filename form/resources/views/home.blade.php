@extends('layouts.right-menu')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="d-flex justify-content-center">
        <div class="col-md-2 col-4">
            <img width="100%" height="170px" class="rounded-circle" src={{asset("images/wlidat-lkhir.jpg")}} alt="logo wlidat lkhir"  />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="nom" id="nom" class="form-control input-form" placeholder="إسم رب الأسرة"   />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="cin" id="cin" class="form-control input-form" placeholder="رقم البطاقة الوطنية"   />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="adresse" id="adresse" class="form-control input-form" placeholder="العنوان"   />
        </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <div class="col-md-5 col-10 ">
            <input type="text" name="telephone" id="telephone" class="form-control input-form" placeholder="الهاتف"   />
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
    


    
</div>
@endsection
