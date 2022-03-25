
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول</title>
    <link rel="icon" href="{{asset('images/wlidat-lkhir.jpg')}}" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Cairo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css"> 
	<script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script> 
</head>
<body class="login-body">
    <div class="container pt-5 mt-5" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card login-card">
                    <div class=" text-center text-show login-card-header fs-4">
                        <img width="100" class="rounded-circle mb-2"  src="{{asset("images/wlidat-lkhir.jpg")}}" alt="logo wlidat lkhir" />
                       <br> 
                       <span class="mt-5 mb-5">{{ __('تسجيل الدخول') }}</span>
                       
                    </div>

    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end text-show text-show text-lbl fs-5">{{ __('البريد الإلكتروني') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end text-show text-show text-lbl fs-5">{{ __('كلمة المرور') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control text-right rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                          
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 ">
                                    <button type="submit" class=" col-12 btn btn-form d-grid">
                                        {{ __('تسجيل الدخول') }}
                                    </button>
    
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 ">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link text-show fs-5" href="{{ route('password.request') }}">
                                        {{ __('نسيت كلمة المرور') }}
                                    </a>
                                @endif
    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

