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
    <script src="{{ asset('js/alert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/imageDisplay.js') }}" type="text/javascript"></script>

    <link rel="icon" href="{{asset('images/wlidat-lkhir.jpg')}}" />
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Cairo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css"> 
	<script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script> 

</head>
<body id="body">
    
    <div class="row">
        <div class="col-2  ps-0 " id="right-menu" style="display: inline">
            <div class="right-menu scrollbar" >

                <!-- logo wlidat lkhir -->
                <div class="row">
                    <div class="col-12">
                <div class="d-flex justify-content-center" >
                  
                    <img   class="col-md-5 col-8 rounded-circle img-fluid" src="{{asset("images/wlidat-lkhir.jpg")}}" alt="logo wlidat lkhir" />
                   
                    
            </div>
            </div>
            </div>

              <!--???????????? ????????????????  -->
              <div class="row mt-5">
                <div class="col-12 text-center">
            
               <a class="@php echo  $page_active=="home" ? "lien-active" : "lien-menu" @endphp" href="{{route("home")}}"><i class="fa-solid fa-house-chimney fa-lg "></i>   <span class="d-none d-md-block">???????????? ????????????????</span>
                  
               </a>
        </div>
        </div>

            <!--??????????????-->
            <div class="row mt-5">
                <div class="col-12 text-center">
            
               <a class="@php echo  $page_active=="responsable" ? "lien-active" : "lien-menu" @endphp" href="{{route("responsable.index")}}">  <i class="fa-solid fa-user-shield fa-lg"></i> <span class="d-none d-md-block">???? ???????????? </span>
                  
               </a>
        </div>
        </div>

        <!-- ??????????????-->
        <div class="row mt-5">
            <div class="col-12 text-center">
       
           <a class="@php echo  $page_active=="personne" ? "lien-active" : "lien-menu" @endphp" href="{{route("personne.index")}}"><i class="fa-solid fa-person fa-lg"></i><span class="d-none d-md-block"> ??????????????</span></a>
        
    </div>
    </div>
 <!-- ??????????????-->
        <div class="row mt-5">
            <div class="col-12 text-center">
        
           <a class="@php echo  $page_active=="enfant" ? "lien-active" : "lien-menu" @endphp" href="{{route("enfant.index")}}"><i class="fa-solid fa-child fa-lg"></i><span class="d-none d-md-block"> ??????????????</span></a>
        
    </div>
    </div>
    @if (Auth::user()->role=="admin")
    <div class="row mt-5">
        <div class="col-12 text-center">
           
        <a href="{{ route('register') }}" class="@php echo  $page_active=="admin" ? "lien-active" : "lien-menu" @endphp" href="{{route("enfant.index")}}">
            <i class="fa-solid fa-user-plus fa-lg"></i><span class="d-none d-md-block">?????????? ????????</span>
           
        </a>
                            
           
    </div>  
    </div>
    @endif

    <div class="row mt-5">
        <div class="col-12 text-center">
            <a class="lien-menu"  href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket fa-lg"></i><span class="d-none d-md-block"> ?????????? ????????????</span></a>
     
            
              

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
           
</div>  
</div>


            </div>

        </div>
        
        <div class="col pe-0">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm top-menu">
           
         
            <div class="container-md">
                <a class="navbar-brand text-right" id="img-right-menu">
                    <i class="fa-solid fa-bars fa-lg " id="icon" ></i>      
                </a>  
                <a class="navbar-brand text-right ">
                 
                {{$page_name}}   
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if($search) 
                        <ul class="navbar-nav me-md-5 mt-md-0 mt-3 col-md-5 col-12">
                            <form action="{{route($page_active.".search")}}" method="post">
                                @csrf
                                @method("POST")
                                <input type="text" name="search" class="form-control input-form col-12a  d-grid" placeholder="??????" />
                            </form>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                    @if ($page_active!="home" && $page_active!="admin"  )
                    
                        <!-- Authentication Links -->
                     
                        <a href="{{route($lien_show)}}" class="@php echo  $action=="show" ? "lien-active" : "lien-menu" @endphp  me-md-3  "> ??????</a>
                        <a href="{{route($lien_create)}}" class="@php echo  $action=="add" ? "lien-active" : "lien-menu" @endphp  me-md-3  ">?????????? </a>
                        <a href="{{route($lien_show)}}" class="@php echo  $action=="update" ? "lien-active" : "lien-menu" @endphp  me-md-3  "> ??????????</a>
                      
                       
                    
                    @endif
                    <a class="fs-5 lien-menu text-danger text-md-right text-center ms-md-5" > ???????????? : {{Auth::user()->name}}</a>
                </ul>
                </div>
            </div>
        </nav>
       
        <main class="ms-4">
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
