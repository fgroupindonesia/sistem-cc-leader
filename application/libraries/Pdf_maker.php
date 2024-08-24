<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// this calls will be available once the config is using
// $config['composer_autoload'] = TRUE; inside the config.php
// and the vendor folder is located inside 'application' folder too...
require_once APPPATH . 'vendor/autoload.php';
use Dompdf\Dompdf; 

class Pdf_maker {

	 protected $CI;

	public function __construct()
    {
        $this->CI =& get_instance();
       
    }

    private function getFileName(){
    $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
		// Format the date and time as desired
	$tgl = $dt->format("Ymd_His");
   	$namiFile = "printing_" . $tgl . ".pdf";
   	return $namiFile;
    }

   public function generateFile($dataPassed){
	

	   //$dompdf = new Dompdf();
	   $dompdf = new Dompdf(array('enable_remote' => true));

	   // $page_data = array('name' => 'mydata');
	   // $this->CI->parser->parse($view, $data, true);
	   // $this->load->view('template/test', $page_data, TRUE); 
	   // $html = file_get_contents("pdf-content.html");
	   $t = $this->CI->load->view('print-barcode-content', $dataPassed, true);
	   $dompdf->loadHtml($t); 
 
		// (Optional) Setup the paper size and orientation 
		$dompdf->setPaper('A4', 'landscape'); 
		 
		// Render the HTML as PDF 
		$dompdf->render(); 
		 
		// Output the generated PDF to Browser the file is automatically downloaded
		$dompdf->stream($this->getFileName(), array('Attachment' => 0));

		
   }

   public function downloadFile($dataPassed){
   	  $dompdf = new Dompdf(array('enable_remote' => true));

	   // $page_data = array('name' => 'mydata');
	   // $this->CI->parser->parse($view, $data, true);
	   // $this->load->view('template/test', $page_data, TRUE); 
	   // $html = file_get_contents("pdf-content.html");
	   $t = $this->CI->load->view('print-barcode-content', $dataPassed, true);
	   $dompdf->loadHtml($t); 
 
		// (Optional) Setup the paper size and orientation 
		$dompdf->setPaper('A4', 'landscape'); 
		 
		// Render the HTML as PDF 
		$dompdf->render(); 
		 
		header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $this->getFileName() . '"');

        // Output the PDF content
        echo $dompdf->output();
   }

  
   
}
?>