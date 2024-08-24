<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses {
	
	 protected $CI;

    public function __construct() {
        $this->CI =& get_instance(); // Get the CI super object
    }

	public function ensureAccessAdmin(){
			if(!$this->isAdmin()){
				redirect('/login');
			}
		}
		
	public function ensureAccessBoth(){
			if(!$this->isAdmin() && !$this->isStaff()){
				redirect('/login');
			}
		}

public function getVisibilityVariables($dataAnyar){

  			$l_vb = $this->getStatusManagement(0);
              $j_vb = $this->getStatusManagement(1);
              $stockBoxIn = $this->getStatusManagement(2);
              $stockBoxOut = $this->getStatusManagement(3);
              
              $s_vb = "";
             // echo var_dump($stockBoxIn);
              if($stockBoxIn==0 && $stockBoxOut==0){
                  $s_vb = "hidden";
              }else if($stockBoxIn=="hidden" && $stockBoxOut=="hidden"){
                $s_vb = "hidden";
              }

              $u_vb = $this->getStatusManagement(4);
              $c_vb = $this->getStatusManagement(5);
              $r_vb = $this->getStatusManagement(6);
              $i_vb = $this->getStatusManagement(7);

              // for visibility works
              $dataAnyar['l_vb'] = $l_vb;
              $dataAnyar['j_vb'] = $j_vb;
              $dataAnyar['s_vb'] = $s_vb;
              $dataAnyar['c_vb'] = $c_vb;
              $dataAnyar['r_vb'] = $r_vb;
              $dataAnyar['i_vb'] = $i_vb;
              $dataAnyar['u_vb'] = $u_vb;

              return $dataAnyar;

	}

public function getStatusManagement($post){

		// $data_akses is coming with the following format
		// 1,1,1,1,1,1,1 consists of 8 entries 
		
		$nama =  $this->CI->session->userdata('hak_akses');

		$this->CI->load->model('DBAkses');

		$dataRow = $this->CI->DBAkses->getSpecificBy('nama', $nama);

		if ($dataRow !== false) {
    		
		$data_akses = $dataRow->data_akses;

		$splitted = explode(',', $data_akses);
		
			if($splitted[$post] == 0){
				return "hidden";
			}else{
				return 1;
			}

		}else {
			// always shown because he is admin
			// and doesnt have data hak akses inside db
			return 1;
		}

		return $splitted[$post];

		

	}

   public function isAdmin(){
		//$total_now =  $this->session->userdata('total_user');
		$user_type =  $this->CI->session->userdata('hak_akses');
		
		if($user_type == 'admin'){
		return true;
		}
		
		return false;
		
	}

	public function getAkses($post, $dataIn){

		// $val is coming with the following format
		// 1,1,1,1,1,1,1 consists of 7 entries 
		

		$splitted = explode(',', $dataIn);
		
		return $splitted[$post];

	}

	
	
	public function tampilkanHakAkses(){
		//$total_now =  $this->session->userdata('total_user');
		$user_type =  $this->CI->session->userdata('hak_akses');
		
		return $user_type;
		
	}
   

	public function update_avatar(){

			// baca data avatar terbaru
		$id = $this->CI->session->userdata('id');
		$dataAwal =	$this->CI->session->userdata('avatar');
		$this->CI->load->model('DBUser');
		$dataBaru = $this->CI->DBUser->get_avatar_by_id($id);

		if($dataBaru != $dataAwal){
			$this->CI->session->set_userdata('avatar', $dataBaru);
		}

	}

	public function isStaff(){
		//$total_now =  $this->session->userdata('total_user');
		$user_type =  $this->CI->session->userdata('hak_akses');
		
		if (strpos($user_type, 'admin') === false) {
    		return true;
		}
		
		return false;
		
	}
   
   
}

?>