<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Cairo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="row">
        <div class="col-2  ps-0 " id="right-menu" style="display: none">
            <div class="right-menu" >

                <!-- logo wlidat lkhir -->
                <div class="row">
                    <div class="col-12">
                <div class="d-flex justify-content-center" >
                    <img   class="col-md-5 col-8 img-fluid"   src="{{asset("images/wlidat-lkhir.jpg")}}" alt="logo wlidat lkhir" />
                </div>
            </div>
            </div>

              <!--الصفحة الرئيسية  -->
              <div class="row mt-5">
                <div class="col-12 text-center">
            
               <a class="lien-menu"> <i class="fa-solid fa-house-chimney fa-lg "></i>  <span class="d-none d-md-block">الصفحة الرئيسية</span>
                  
               </a>
        </div>
        </div>

            <!--االأسرة-->
            <div class="row mt-5">
                <div class="col-12 text-center">
            
               <a class="lien-menu"> <i class="fa-solid fa-user-group fa-lg "></i> <span class="d-none d-md-block"> الأسرة</span></a>
            
        </div>
        </div>

        <!-- الأفراد-->
        <div class="row mt-5">
            <div class="col-12 text-center">
       
           <a class="lien-menu"><i class="fa-solid fa-person fa-lg"></i><span class="d-none d-md-block"> الأفراد</span></a>
        
    </div>
    </div>
 <!-- الأطفال-->
        <div class="row mt-5">
            <div class="col-12 text-center">
        
           <a class="lien-active"><i class="fa-solid fa-child fa-lg"></i><span class="d-none d-md-block"> الأطفال</span></a>
        
    </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
   
       <a class="lien-menu "><i class="fa-solid fa-right-from-bracket fa-lg"></i><span class="d-none d-md-block"> تسجيل الخروج</span></a>
    
</div>  
</div>
            </div>

        </div>
        
        <div class="col pe-0">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm top-menu">
           
            <a class="navbar-brand text-right" id="img-right-menu">
                <i class="fa-solid fa-bars fa-lg me-2" id="icon" ></i>
            </a>
            <div class="container-md">
               
                <a class="navbar-brand text-right" href="{{ url('/') }}">
                    
                    <i class="fa-solid fa-house-chimney"></i>  الصفحة الرئسية
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-md-5 mt-md-0 mt-3 col-md-3 col-12">
                        <input type="text" name="search" class="form-control input-form  d-grid" placeholder="بحث" />
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links 
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest-->
                        <a class="lien-menu me-md-3  ">إنشاء </a>
                        <a class="lien-menu me-md-3 "> تحديث</a>
                        <a class="lien-menu me-md-3 ">حدف </a>
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="py-4">
            <div class="row">
                @yield('content')
            </div>
        </main>
    </div>

        
    </div>
    <script>
        var imgRightMenu = document.getElementById('img-right-menu');
        var right_menu = document.getElementById("right-menu");
        var btn_right_menu = document.getElementById('btn-right-menu');
        
        var icon = document.getElementById('icon');
        imgRightMenu.addEventListener("click",()=>{
            if(right_menu.style.display=="none"){
             
                right_menu.style.display = "inline";
            }else{
                right_menu.style.display = "none";
              
            }
        }) ; 
    </script>

</body>
</html>
