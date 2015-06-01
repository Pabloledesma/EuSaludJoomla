<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\App;
use App\Http\Requests;
use function view;
use DB;
use Vsmoraes\Pdf\Pdf;


class InfoController extends Controller {

    private $pdf;
    
    public function __construct(Pdf $pdf) {
        $this->middleware('auth');
        $this->pdf = $pdf;
    }
    
    
    public function index()
    {       
        return view('info.index');  
    }
    
    /*
     * Certificado de pagos a profesionales de la salud
     */
    public function form_certificado_pagos_profesionales()
    {
        return view('info.certificado_pagos');
    }
    
    public function certificado_pagos_profesionales( Requests\Certificado_de_pagos $request )
    {
        $input = $request->all();
        if( isset($input['num_id']) ){
            $num_id = $input['num_id'];
        } else {
            $num_id = \Auth::user()->num_id;
        }
        $query = "SELECT 
            dbo.MOVCONT3.DOCCOD, 
            dbo.MOVCONT3.MvCNro,            
            dbo.MOVCONT3.MvCFch, 
            dbo.MOVCONT2.MvCNat, 
            dbo.CUENTAS.CntInt, 
            dbo.MOVCONT2.CntCod, 
            dbo.CUENTAS.CntDsc, 
            dbo.MOVCONT2.TrcCod, 
            dbo.TERCEROS.TrcRazSoc, 
            dbo.MOVCONT2.MvCVlr, 
            dbo.MOVCONT2.MvCDocRf1, 
            dbo.MOVCONT2.MvCDocRf2, 
            dbo.MOVCONT2.MvCDet, 
            dbo.MOVCONT2.MvCBse, 
            dbo.MOVCONT2.MvCImpCod
        FROM 
            ((dbo.MOVCONT3 INNER JOIN dbo.MOVCONT2 ON 
            (dbo.MOVCONT3.MCDpto = dbo.MOVCONT2.MCDpto) AND 
            (dbo.MOVCONT3.MvCNro = dbo.MOVCONT2.MvCNro) AND 
            (dbo.MOVCONT3.DOCCOD = dbo.MOVCONT2.DOCCOD) AND 
            (dbo.MOVCONT3.EMPCOD = dbo.MOVCONT2.EMPCOD)) 
            LEFT JOIN dbo.CUENTAS ON (dbo.MOVCONT2.CntCod = dbo.CUENTAS.CntCod) AND 
            (dbo.MOVCONT2.CntVig = dbo.CUENTAS.CntVig)) 
            LEFT JOIN dbo.TERCEROS ON dbo.MOVCONT2.TrcCod = dbo.TERCEROS.TrcCod
        WHERE (((dbo.MOVCONT3.MvCFch) Between convert(datetime, '".$input['fecha_inicio']."' ,101) And 
        convert(datetime,'" . $input['fecha_final'] . "', 101)) AND ((dbo.MOVCONT3.MvCEst)<>'N') AND 
        ((dbo.MOVCONT2.TrcCod)= '" . $num_id . "')) ORDER BY dbo.MOVCONT3.MvCFch";
        
        $info = DB::connection('sqlsrv_info')->select($query);
        
        if(isset($info) && count($info) > 0){
            $html = view('info.informe', compact('info', 'input'))->render();
            return $this->pdf->load( $html, array(0,0,1300, 800) )
                    ->filename('certificado_de_pagos_profesionales_' . date('Y-m-d H:i:s') . '.pdf' )
                    ->download();
      
        }                                  
        return view('info.sin_resultados', compact('input'));
 
    }
    

}
