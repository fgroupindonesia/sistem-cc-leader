<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('DBUser');
		$this->load->model('DBFormulir');
		$this->load->model('DBDynamic');
	}

	public function getSession($key){

		return $this->session->userdata($key);

	}

	public function settings(){

		$id = $this->getSession('id');
		$data = $this->DBUser->getSpecificBy('id', $id);

		$div_it 	= "";
		$div_doc 	= "";
		$div_lead 	=  "";
		$div_none 	=  "";

		if($data->divisi == "IT"){
			$div_it = "selected";
		}else if($data->divisi == "Document Control"){
			$div_doc = "selected";
		}else if($data->divisi == "Leader"){
			$div_lead = "selected";
		}else {
			$div_none = "selected";
		}

		$datana = array(
			'data_user' => $data,
			'div_none'	=> $div_none,
			'div_it' 	=> $div_it,
			'div_doc' 	=> $div_doc,
			'div_lead'	=> $div_lead
		);

		$this->load->view('form_settings', $datana);

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
			'code_json' => $datana->code_json,
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

		$datana = array(
			'name' 		=> "",
			'code_json' => ""
		);

		$this->load->view('form_data_baru', $datana);
		
	}

	public function edit_formulir(){

		$id = $this->input->get('id');

 	$data = $this->DBFormulir->getSpecificBy('id', $id);

 	if($data != false){
 		$datana = array(
 			'name' 		=> $data->name,
 			'code_json' => $data->code_json,
 			'status' 	=> 'edit',
 			'id'		=> $id
 		);

 	}

		$this->load->view('form_data_baru', $datana);
		
	}

	public function edit_user(){

		$id = $this->input->get('id');

		$data = $this->DBUser->getSpecific($id);

		$div_it 	= "";
		$div_doc 	= "";
		$div_lead 	=  "";

		if($data->divisi == "IT"){
			$div_it = "selected";
		}else if($data->divisi == "Document Control"){
			$div_doc = "selected";
		}else if($data->divisi == "Leader"){
			$div_lead = "selected";
		}

		$datana = array(
			'data_user' => $data,
			'div_it' 	=> $div_it,
			'div_doc' 	=> $div_doc,
			'div_lead'	=> $div_lead
		);

		//echo var_dump($data);

		$this->load->view('form_user_baru', $datana);

	}

	public function add_new_user(){

		$data = array(
			"div_it" => "",
			"div_doc" => "",
			"div_lead" => ""
		);

		$this->load->view('form_user_baru', $data);
		
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

	public function management_user(){

		$data = $this->DBUser->getAll();

		if(!empty($data)){
		$data = array_reverse($data);

		$dataNa = array(
			'data_user' => $data
		);

		$this->load->view('management_user', $dataNa);
		
		}else{
				$this->load->view('management_user');	
		}
		
	}

	public function dashboard(){

		$dataForm = $this->DBFormulir->getAllLimitSortBy(10, 'DESC');
		$dataUser = $this->DBUser->getAllLimitBy(10);

		// if we have no data
		// the end result will be false

		$t_user = 0;
		$t_form = 0;


		//echo var_dump($user_divisi);

		if($dataUser != false){
			$t_user = count($dataUser);
		}

		if($dataForm != false){
			$t_form = count($dataForm);
		}

		$datana = array(
			'data_user' => $dataUser,
			'data_form' => $dataForm,
			'total_user' => $t_user,
			'total_form' => $t_form
		);

		$this->load->view('dashboard', $datana);
		
	}

	

	


}
