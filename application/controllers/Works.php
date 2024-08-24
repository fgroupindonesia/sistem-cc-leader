<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Works extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBFormulir');
		$this->load->model('DBDynamic');
	}

	public function logout()
	{
		redirect('/login', 'location', 302);
	}

	

	public function add_data_formulir(){

		$tableName = $this->input->post('target-form');

		$this->DBDynamic->update_table_name($tableName);

		// nama lainnya
		$n = $this->input->post(NULL, TRUE);

		// recreate the form data 
		// with special character
		$finalData = array();

		foreach($n as $key=>$val){
			// we dont construct several naming:
			// target-form and button-
			if($key != 'target-form' ){
				
				$newKey = strtolower($key);
				$newKey = str_replace("-","_", $newKey);
				
				if(!$this->button($newKey))
				$finalData[$newKey] = $val;
				
			}
		}

		$this->DBDynamic->insert($finalData);

		header('location:/success');
        exit();
			
		//echo var_dump($finalData);
	}

	private function button($namina){
		if(strpos($namina, 'button_') !== false) {
			return true;
		} 
		    return false;
		
	}

	// used as user sharing input
	public function input_data_formulir(){

		$name = $this->input->get('name');
		$nameWSpaces = str_replace("_", " ", $name);

		$datana = $this->DBFormulir->getSpecificBy('name', $nameWSpaces);

		if(!empty($datana)){

		$formContent = $datana->code_json;

		$data = array(
			'content' => $formContent,
			'status' => 'input',
			'fname' => $name
		);

		$this->load->view('display_formulir', $data);

		}
	}

	

	public function add_formulir()
	{

		$n = $this->input->post('name');
		$c = $this->input->post('code_json');

		$data = array(
			'name' => $n,
			'code_json' => $c
		);

		$result = $this->DBFormulir->insert($data);

		$this->create_new_form($n, $c);

		echo $result;
	}
	
	private function create_new_form($tableName, $datajson){

		// this will call the query inside the model
		$this->DBDynamic->create_new_table($tableName, $datajson);

	}

	public function edt_formulir()
	{

		

	}

	public function delete_formulir()
	{

		$id = $this->input->post('id');
		
		$result = $this->DBFormulir->delete($id);

		echo $result;

	}

	public function update_formulir()
	{

		

	}

}
