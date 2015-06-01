<?php namespace App\Http\Controllers;
use Vsmoraes\Pdf\Pdf;
use Maatwebsite\Excel\Excel;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
        private $pdf;
        private $excel;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct( Pdf $pdf, Excel $excel )
	{
		$this->middleware('guest');
                $this->pdf = $pdf;
                $this->excel = $excel;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            return view('welcome.inicio');
//$html = view('auth.login')->render();
            //return $this->pdf->load($html)->download();
            /*
            $this->excel->create('mi primer archivo excel en laravel', function($excel){
                $excel->sheet('Sheetname', function($sheet){
                    $sheet->mergeCells('A1:M1');
                    $sheet->mergeCells('A2:M2');
                    $data = [];
                   
                    array_push($data, array('Clínica EuSalud'));
                    array_push($data, array('Certificado de pagos a profesionales de la salud'));
                    array_push($data, array(
                        'Documento Contable',
                        'Numero de documento contable',      
                        'Fecha',
                        'Naturaleza',
                        'Tipo de Cuenta',
                        'Cuenta',
                        'Nombre de cuenta',
                        'Valor',
                        'Referencia 1',
                        'Referencia 2',
                        'Detalle',
                        'Base',
                        'Impuesto',
                    ));
                    $sheet->fromArray( $data, null, 'A1', false, false );
                   
                    $sheet->cells('A1:M1', function($cells){
                        
                        $cells->setFontColor('#ffffff');                 
                        $cells->setFontFamily('Calibri');
                        $cells->setFontSize(16);
                        $cells->setFontWeight('bold');
                        $cells->setAlignment('center');
                        $cells->setValignment('middle');
                        $cells->setBackground('#1E7F74');
                    });
                    $sheet->cells('A2:M2', function($cells){
                       
                        $cells->setFontColor('#ffffff'); 
                        $cells->setFontFamily('Calibri');
                        $cells->setFontSize(12);
                        $cells->setFontWeight('bold');
                        $cells->setAlignment('center');
                        $cells->setValignment('middle');
                        $cells->setBackground('#1E7F74');
                    });
                    
                    $sheet->cells('A3:M3', function($cells){
                        $cells->setFontColor('#000000');
                        $cells->setFontFamily('Calibri');
                        $cells->setFontSize(10);
                        $cells->setFontWeight('bold');
                        $cells->setAlignment('center');
                        $cells->setValignment('middle');
                        $cells->setBackground('#FFFFFF');
                    });
                    
                });
            })->download('xlsx');
          */
            
	}

}
