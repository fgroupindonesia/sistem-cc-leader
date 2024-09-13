<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Works extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DBFormulir');
		$this->load->model('DBDynamic');
		$this->load->model('DBUser');
		$this->load->model('DBHistoryFormulir');

	}

	public function test(){
		
		$this->export_to_excel();

	}

	public function convertDataIntoStringList($arrayNa){



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


	public function export_to_excel(){

		// we got the table name first
		$name = $this->input->post('name');


		$namaFormulir = "Formulir :" . $name;
		$generatedDate = "Data Report : " . date('d-m-Y h:i:s');

	$datana = $this->DBFormulir->getSpecificBy('name', $name);

		$namaKolom = array();
		
		$namaKolom = $this->extractLabelOnly($datana);


		$blank = "";

		$this->DBDynamic->update_table_name($name);
		$data_all =  $this->DBDynamic->getAll();

		if($data_all == false){
			$data_all = array();
		}else{

			// when we found a data

		}

		$data = array(
    		array($namaFormulir),
    		array($generatedDate),
    		array($blank)
		);


		// We add name for each column manually
		array_unshift($namaKolom, 'No.', 
			'Gedung', 
			'Username', 
			'Date Created');
		

		$data[] = ($namaKolom);

		// because this library
		// just need a string for each lins
		// thus the object inside the array 
		// of result set transformed into string line by line

		//	echo var_dump($data_all);
			foreach($data_all as $n){
				$row = array();
				foreach($n as $x){
					$row[] = $x;
				}
				$data[] = $row;
			}



		$writer = new XLSXWriter();
		$writer->writeSheet($data);
		$writer->writeToFile('reports/output.xlsx');


	}

	public function download_excel(){

		$yourFile = 'reports/output.xlsx';

		$file = @fopen($yourFile, "rb");

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=output.xlsx');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($yourFile));
        while (!feof($file)) {
            print(@fread($file, 1024 * 8));
            ob_flush();
            flush();
        }

	}

	public function verify_login(){

		$u = $this->input->post('username');
		$p = $this->input->post('pass');

$dataArray = array('username'=> $u, 'pass'=>$p);

$data_user = $this->DBUser->getSpecificByFilter($dataArray);

//echo var_dump($data_user);

		if($data_user != false){

			$datana = array(
			'username' 	=> $data_user->username,
			'pass' 		=> $data_user->pass,
			'id' 		=> $data_user->id,
			'divisi'	=> $data_user->divisi,
			'gedung'	=> $data_user->gedung
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
		$u 		= $this->input->post('username');
		$gedung	= $this->input->post('gedung');

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

		$finalData['gedung']	= $gedung;
		$finalData['username']	= $u;
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

	public function getSession($key){

		return $this->session->userdata($key);

	}

	// used as user sharing input
	public function input_data_formulir(){

		$u = $this->getSession('username');
		$gedung = $this->getSession('gedung');
		$name = $this->input->get('name');
		$nameWSpaces = str_replace("_", " ", $name);

		$datana = $this->DBFormulir->getSpecificBy('name', $nameWSpaces);

		if(!empty($datana)){

		$formContent = $datana->code_json;

		$data = array(
			'content' => $formContent,
			'status' => 'input',
			'fname' => $name,
			'username' => $u,
			'gedung' => $gedung
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

	public function add_history_formulir(){


		$u 			= $this->input->post('username');
		$dbefore 	= $this->input->post('data_before');
		$dafter 	= $this->input->post('data_after');
		$fname 		= $this->input->post('formulir_name');

		$data = array(
			'username' 		=> $u,
			'data_before'	=> $dbefore,
			'data_after'	=> $dafter,
			'formulir_name'	=> $fname
		);

		$result = $this->DBHistoryFormulir->insert($data);

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
		$g = $this->input->post('gedung');

		$data = array(
			'fullname' => $f,
			'username' => $u,
			'pass' => $p,
			'no_hp' => $nhp,
			'email' => $e,
			'divisi' => $d,
			'gedung' => $g
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
		$g = $this->input->post('gedung');

		$data = array(
			'id' => $id,
			'fullname' => $f,
			'username' => $u,
			'pass' => $p,
			'no_hp' => $nhp,
			'email' => $e,
			'gedung' => $g,
			'divisi' => $d
		);

		$result = $this->DBUser->update($data, $id);

		echo $result;
	}

	public function update_formulir()
	{

		$id = $this->input->post('id');
		$n = $this->input->post('name');
		$c = $this->input->post('code_json');

		$data = array(
			'name' => $n,
			'code_json' => $c
		);

		$result = $this->DBFormulir->update($data, $id);

		echo $result;

	}

}
