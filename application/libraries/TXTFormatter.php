<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TXTFormatter {
	
	 protected $CI;

    public function __construct() {
        $this->CI =& get_instance(); // Get the CI super object
    }

  public function generate2Digit($num){
    if ($num < 100) {
          $f = sprintf('%02d', $num);
      } else {
          $f = $num;
      }
      return $f;
  }
   
}

?>