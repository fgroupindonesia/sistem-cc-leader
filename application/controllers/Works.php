<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Works extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBFormulir');
		$this->load->model('DBDynamic');
		$this->load->model('DBUser');
	}

	public function verify_login(){

		$u = $this->input->post('username');
		$p = $this->input->post('pass');

		$data_user = $this->DBUser->getSpecificBy('username', $u);

		if($data_user != false){

			$datana = array(
			'username' 	=> $data_user->username,
			'pass' 		=> $data_user->pass,
			'id' 		=> $data_user->id,
			'divisi'	=> $data_user->divisi
			);

			$this->session->set_userdata($datana);

			header('Location: /dashboard');
			exit();

		} else {
			header('Location: /');
			exit();
		}

		
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

		// delete duplicates formulir
		$dataF = $this->DBFormulir->getSpecificBy('name', $n);
		if($dataF != false){
			$idna = $dataF->id;
			$this->delete_form($idna, $n);
		}

		$result = $this->DBFormulir->insert($data);

		$this->create_new_form($n, $c);

		echo $result;
	}

	private function delete_form($idna, $namena){

		$this->DBFormulir->delete($idna);
		$this->DBDynamic->drop_table($namena);

	}
	
	private function create_new_form($tableName, $datajson){

		// this will call the query inside the model
		$this->DBDynamic->create_new_table($tableName, $datajson);

	}

	public function edt_formulir()
	{

		

	}

	public function delete_all_data_formulir()
	{
		
		$namaTable = $this->input->post('name');

		$this->DBDynamic->update_table_name($namaTable);

		$result = $this->DBDynamic->delete_all();

		echo $result;

	}

	public function delete_formulir()
	{

		$id = $this->input->post('id');
		$tableName = $this->input->post('name');
				
		$result = $this->DBFormulir->delete($id);

		$this->DBDynamic->update_table_name($tableName);
		$this->DBDynamic->drop();

		echo $result;

	}

	public function add_user()
	{

		$f = $this->input->post('fullname');
		$u = $this->input->post('username');
		$p = $this->input->post('pass');
		$nhp = $this->input->post('no_hp');
		$e = $this->input->post('email');
		$d = $this->input->post('divisi');

		$data = array(
			'fullname' => $f,
			'username' => $u,
			'pass' => $p,
			'no_hp' => $nhp,
			'email' => $e,
			'divisi' => $d
		);

		$result = $this->DBUser->insert($data);

		echo $result;
	}

	public function delete_user()
	{

		$id = $this->input->post('id');

		$result = $this->DBUser->delete($id);

		echo $result;

	}

	public function update_settings(){
	  $hasil =	$this->update_user();

	  
	  	header('Location: /dashboard');
	  	exit();
	

	}

	public function update_user()
	{

		$id = $this->input->post('id');
		$f = $this->input->post('fullname');
		$u = $this->input->post('username');
		$p = $this->input->post('pass');
		$nhp = $this->input->post('no_hp');
		$e = $this->input->post('email');
		$d = $this->input->post('divisi');

		$data = array(
			'id' => $id,
			'fullname' => $f,
			'username' => $u,
			'pass' => $p,
			'no_hp' => $nhp,
			'email' => $e,
			'divisi' => $d
		);

		$result = $this->DBUser->update($data, $id);

		echo $result;
	}

	public function update_formulir()
	{

		

	}

}
