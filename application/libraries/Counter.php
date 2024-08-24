<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counter {
	
	 protected $CI;

    public function __construct() {
        $this->CI =& get_instance(); // Get the CI super object
    }

   public function updateTotal($whichTotal, $add){
		//$total_now =  $this->session->userdata('total_user');
		$total_now =  $this->CI->session->userdata($whichTotal);
		
		if($add){
			$total_now++;
		} else {
			$total_now--;
		}
		$dataNa = array($whichTotal => $total_now);
		$this->CI->session->set_userdata($dataNa);
	}

	 public function updateTotalBox($whichTotal, $increase, $decrease){
		//$total_now =  $this->session->userdata('total_user');
		$total_now =  $this->CI->session->userdata($whichTotal);
		
		if($increase>0){
			$total_now += $increase;
		} else if ($increase == null && $decrease > 0) {
			$total_now -= $decrease;
		}
		$dataNa = array($whichTotal => $total_now);
		$this->CI->session->set_userdata($dataNa);
	}
   
   
}

?>