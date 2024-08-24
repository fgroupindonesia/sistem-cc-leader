<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('DBUser');
		$this->load->model('DBFormulir');
		$this->load->model('DBDynamic');
	}

	
	public function display_formulir(){

		$id = $this->input->get('id');

		$datana = $this->DBFormulir->getSpecific($id);
		$formContent = null;

		//echo var_dump($datana);

		if(!empty($datana))
		$formContent = $datana->code_json;

		$data = array(
			'content' => $formContent,
			'status' => 'demo'
		);

		$this->load->view('display_formulir', $data);
	}

	private function test($dataMentah){
		echo '<pre style="background-color: #f4f4f4; border: 1px solid #ccc; padding: 10px; border-radius: 5px; font-size: 14px; line-height: 1.4;">';
		var_dump($dataMentah);
		echo '</pre>';
	}

	public function display_data_formulir(){

		$id = $this->input->get('id');

		$datana = $this->DBFormulir->getSpecific($id);
		$tableName = $datana->name;
		$tableName = str_replace(" ", "_", $tableName);

		$this->DBDynamic->update_table_name($tableName);
		$dataMentah = $this->DBDynamic->getAll();

		$dataAsak = $this->extractLabelOnly($datana);

		//$this->test($dataAsak);

		if(!empty($datana))
		$data = array(
			'form_name' => $datana->name,
			'data_header' => $dataAsak,
			'data_all' => $dataMentah
		);

		$this->load->view('display_data_formulir', $data);
		
	}

	private function extractLabelOnly($data1){
		
		$dataArray = json_decode($data1->code_json, true);

		// Initialize an array to hold the label values
		$labels = [];

		// Iterate through the array and collect label values
		foreach ($dataArray as $item) {
		    if (isset($item['label'])) {
		        $labels[] = $item['label'];
		    }
		}

		return $labels;

	}

	private function clearSession(){
		if(isset($_SESSION['status'])){
			unset($_SESSION['status']);	
		}
	}

	public function success(){
		$this->load->view('thank_you');
	}

	public function login(){

		$this->load->view('login');
		
	}

	public function add_new_formulir(){

		$this->load->view('form_data_baru');
		
	}

	public function add_new_staff(){

		$this->load->view('form_staff_baru');
		
	}

	public function management_formulir(){

		$data = $this->DBFormulir->getAll();

		if(!empty($data)){
		$data = array_reverse($data);

		$dataNa = array(
			'data_formulir' => $data
		);

		$this->load->view('management_formulir', $dataNa);
		
		}else{
				$this->load->view('management_formulir');	
		}

		
	}

	public function management_staff(){

		$this->load->view('management_staff');
		
	}

	public function dashboard(){

		$this->load->view('dashboard');
		
	}

	

	


}
