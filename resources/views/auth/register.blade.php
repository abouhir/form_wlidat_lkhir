@extends('layouts.right-menu' , [
   "page_name" => "المشرف" , 
   "action" => "add" , 
   "search" => false,
   "page_active" => "admin" , 
   "lien_show" => "responsable.index",
   "lien_create" => "responsable.create"
])


@section('content')
<div class="container scrollbar ">
    <div class="row justify-content-center  py-4 mt-5 pe-3 ps-4 mb-5 pb-5">
        <div class="col-md-8 mb-5">
            <div class="card login-card">
               
                    
                    <div class=" text-center text-show login-card-header fs-4">
                        <img width="100"  class="rounded-circle mb-2"  src="{{asset("images/wlidat-lkhir.jpg")}}" alt="logo wlidat lkhir" />
                       <br> 
                       <span class="mt-5 mb-5">{{ __('إضافة مشرف') }}</span>
                       
                    </div>
                
                

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-show text-lbl   fs-5">{{ __('الإسم') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control input-form keyboardInput rounded-pill @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-show text-lbl fs-5">{{ __('البريد الإلكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control input-form rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end text-show text-lbl fs-5">{{ __('نوع المشرف') }}</label>

                            <div class="col-md-6">
                                <select id="role"  class="form-control input-form rounded-pill @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="email">
                                    <option value="" selected disqbled>--نوع المشرف--</option>
                                    <option value="admin">مشرف رئسي</option>
                                    <option value="simple-admin">مشرف عادي</option>
                                </select>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-show text-lbl fs-5">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control input-form rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-show text-lbl fs-5">{{ __('تأكيد كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control input-form rounded-pill" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="col-12 btn btn-form d-grid">
                                    {{ __('إضافة') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@if(Session::get('message'))
    <script >
      alertSuccess("{!!Session::get('message')!!}")
    </script>
@endif
@endsection

