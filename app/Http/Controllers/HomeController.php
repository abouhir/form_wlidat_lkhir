<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use TCPDF;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        if(Auth::user()->role=='admin'){
            $responsables = Responsable::all();
        }else{
            $responsables = Auth::user()->responsables;
        }
        return view('home')->with(["responsables"=>$responsables]);
    }
    public function show($mot){
        $responsable = Responsable::all()->where("mot",$mot)->first();
        return view("show")->with("responsable",$responsable);
    }

    public function search(Request $request){
        if(empty($request->search)){
            return redirect()->route("personne.index");
        }else{
            
            //$responsables = Auth::user()->responsables->where("cin","LIKE",$request->cin."%");
            if(Auth::user()->role=='admin'){
                $responsables = Responsable::join('users',function($join){
                $join->on('users.id', '=', 'responsables.user_id');
            })
            ->where('responsables.name','LIKE',"%".$request->search."%")
            ->orWhere('users.name','LIKE',"%".$request->search."%")
            ->get("responsables.*");
        }else{
            $responsables = Responsable::join('users',function($join){
                $join->on('users.id', '=', 'responsables.user_id');
            })
            ->where(function($query){
                $query->where('responsables.user_id','=',Auth::id());
               
            }) 
            ->where(
                function($query) use($request) {
                    $query->where('users.name','LIKE',"%".$request->search."%")
                    ->orWhere('responsables.name','LIKE',"%".$request->search."%")
                    ;
                })
            ->get("responsables.*");

            
            
        }

        return view("home")->with("responsables",$responsables);
    }
}


    public function imprimer($mot){
        
        $responsable = Responsable::all()->where("mot",$mot)->first();
        
        $style = array(
           
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $view = view("pdf")->with("responsable",$responsable);
        $html_content = $view->render();
       $pdf = new TCPDF();
        $img_file =public_path("images/wlidat-lkhir.jpg");
      $pdf->SetPrintHeader(false);
       $pdf->SetPrintFooter(false);
       $pdf->SetTitle($responsable->name);
       $pdf->AddPage();

       
       
      
    
    $pdf->write2DBarcode(asset("/home/pdf/".$mot), 'QRCODE,L', 20, 5, 30, 30, $style, 'N');
      

    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    $pdf->setLanguageArray($lg);
    $pdf->setFont('aealarabiya','',15);
    $pdf->Text(85, 5, 'المشرف: '.$responsable->user->name);
    $pdf->setFont('aealarabiya','',20);
    $pdf->Text(80, 17, 'الحالةالمستفيدة');
    
    $pdf->setAlpha(0.2);
    $pdf->Image($img_file, 60, 90, 100, 100, '', '', '', false, 350, '', false, true, 0);
    
    $pdf->setPageMark();
    $pdf->setAlpha(1);
    $pdf->Image($img_file, 170, 5, 30, 30, '', '', '', false, 350, '', false, false, 0);
    
    $pdf->writeHTML($html_content, true, false, true, false, '');
    $pdf->AddPage();
    $pdf->Image($img_file, 95, 5, 30, 30, '', '', '', false, 350, '', false, false, 0);
    $pdf->Text(80, 35, 'البطاقة الوطنية');
    $pdf->Image(public_path("storage/cin_images/"."".$responsable->cin_image_verso), 55, 150, 120, 70, '', '', '', false, 350, '', false, true, 0);
    $pdf->Image(public_path("storage/cin_images/"."".$responsable->cin_image_recto), 55, 60, 120, 70, '', '', '', false, 350, '', false, true, 0);
   
    ob_end_clean();
    $pdf->Output($responsable->name.".pdf","D");
  
    }
    
}
