

<!DOCTYPE html>
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
      
        <!-- Styles -->
       
    
    <title>Document PDF</title>
</head>
<body >
    <div>
        
    
        <table>
            
            <thead>
                <tr>
                   <th colspan="2"><br><br></th>
                </tr>                           
            </thead>
            
            <tbody> 
                
                <tr>
                    <th colspan="2">
                        <strong ><span style=" font-size: 20px; color: red;" >رب الأسرة<br><hr></span></strong>
                    </th>
                </tr>
                <tr>
                    <td>
                        <strong>
                            <label style="color: #7CFF01; font-size: 18px;  ">الإسم:</label>
                        </strong>
                        <span style="font-size: 13px;" > {{$responsable->name}} </span>
                    </td>
                    <td>
                        <strong>
                            <label style="color: #7CFF01; font-size: 18px;">رقم البطاقة الوطنية:</label>
                        </strong>
                        <span style="font-size: 13px;" > {{$responsable->cin}} </span>
                    </td>
                </tr>  
                <tr>
                    <td colspan="2">
                        <strong>
                            <label style="color: #7CFF01; font-size: 18px;">العنوان:</label>
                        </strong>    
                        <span style="font-size: 13px;"> {{$responsable->adresse}}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>
                            <label style="color: #7CFF01; font-size: 18px;">الحالة الإجتماعية:</label>
                        </strong> 
                        <span style="font-size: 13px;">  {{$responsable->situation}}</span>
                    </td>
                    <td>
                        <strong>
                            <label style="color: #7CFF01; font-size: 18px;">الهاتف:</label>
                        </strong> 
                        <span style="font-size: 13px;">{{$responsable->telephone}}</span>
                    </td>
                </tr><br>
                <!--  الأفراد      : -->
                <tr>
                    <th colspan="2"><strong style="font-size: 20px; color: red;" >الأفراد<br><hr></strong> </th>
                    
                </tr>
                @foreach ($responsable->personnes as $key => $item)
              
                    <tr>
                        <td>
                            <strong>
                                <label style="color: #7CFF01; font-size: 18px;">الإسم:</label>
                            </strong>
                            <span style="font-size: 13px;">{{$item->name}}</span>
                        </td>
                        <td>
                            <strong>
                                <label style="color: #7CFF01; font-size: 18px;">عامل:</label>
                            </strong>
                            <span style="font-size: 13px;">{{$item->fonctionnelle}}</span>
                        </td>
                    </tr>
                   
                    <tr>
                        <td colspan="2">
                            <strong>
                                <label style="color: #7CFF01; font-size: 18px;">المهاراة:</label>
                                
                            </strong>
                            <span  style="text-align: justify; font-size: 13px;">{{$item->competences}}</span>
                        </td>
                    </tr>
                   @if (count($responsable->personnes)!=$key+1)
                        <hr style="color: #7CFF01;">
                   @endif
                        
 
                @endforeach
                <!--  الأطفال      : -->
    
            <tr>
                <th colspan="2">
                    <strong>
                        <span style="font-size: 20px; color: red;" >الأطفال<br><hr></span>
                    </strong>
                </th><br>
                
            </tr>
            @foreach ($responsable->enfants as $key=>$item)
        
            <tr>
                <td>
                    <strong>
                        <label style="color: #7CFF01; font-size: 18px;">الإسم:</label>
                    </strong>
                    <span style="font-size: 13px;">{{$item->name}}</span>
                </td>
                <td>
                    <strong>
                        <label style="color: #7CFF01; font-size: 18px;">قياس الملابس :</label>
                    </strong>
                    <span style="font-size: 13px;"> {{$item->taille_vtm}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        <label style="color: #7CFF01; font-size: 18px;">قياس الحداء:</label>
                    </strong>
                    <span style="font-size: 13px;">{{$item->taille_chaussure}}</span>
                </td>
                <td>
                    <strong>
                        <label style="color: #7CFF01; font-size: 18px;">المستوى الدراسي:</label>
                    </strong>
                    <span style="font-size: 13px;">{{$item->niveaux_etd}}</span>
                </td><br>
            </tr>
            
            <tr>
                <td>
                    <strong>
                        <label style="color: #7CFF01; font-size: 18px;">معدل الأسدس الأول:</label>
                    </strong>
                    <span style="font-size: 13px;">{{$item->moyenne_s1}}</span>
                </td>
                <td>
                    <strong>
                        <label style="color: #7CFF01; font-size: 18px;">معدل الأسدس الثاني:</label>
                    </strong>
                    <span style="font-size: 13px;">{{$item->moyenne_s2}}</span>
                </td>
            </tr><br>
            @if (count($responsable->enfants)!=$key+1)
                <hr style="color: #7CFF01;"><br>
            @endif
            @endforeach
              
            </tbody> 
        </table>

</body>
</html>
