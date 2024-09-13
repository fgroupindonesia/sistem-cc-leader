<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBDynamic extends CI_Model {

	private $table_name = "table_xxx";

	public function update_table_name($newName){

		$newName = str_replace(" ", "_", $newName);
		$newName = strtolower($newName);

		if(strpos($newName, 'table_') !== true){
			$this->table_name = "table_" . $newName;
		}else{
			$this->table_name = $newName;
		}

	return $this->table_name;
	}

	public function drop_table($namaTable){
		$tableName = str_replace(" ", "_", $namaTable);
		$tableName = strtolower($tableName);

		if(strpos($tableName, 'table_') !== true){
			$tableName = "table_" . $tableName;
		}

		$sqlDROP = "DROP TABLE " . $tableName;

		if ($this->db->query($sqlDROP)) {
            return true;
        }

        return false;

	}

	public function create_new_table($namaTable, $codejson){
		$tableName = str_replace(" ", "_", $namaTable);
		$tableName = strtolower($tableName);

		if(strpos($tableName, 'table_') !== true){
			$tableName = "table_" . $tableName;
		}

		$dataColumn = $this->create_sql_column($codejson);
		$sqlCREATE = "CREATE TABLE IF NOT EXISTS " . $tableName . " " . $dataColumn;

		if ($this->db->query($sqlCREATE)) {
            return true;
        }

        return false;

	}

	public function drop(){

		$sqlDROP = "DROP TABLE " . $this->table_name;

		if ($this->db->query($sqlDROP)) {
            return true;
        }

        return false;
	}

	private function create_sql_column($dataMasuk){

    $arr = json_decode($dataMasuk, true);    
    
    // user want we add username and timestamp
    // and also gedung in front after id
    $cString = "(id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,gedung VARCHAR(75) NOT NULL, username VARCHAR(75) NOT NULL, date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";

    foreach($arr as $item){
        $colName = str_replace("-","_", $item['name']);
        $cString .= "," . $colName . " " . $this->detect_type($item['type']) . " NOT NULL";
    }

    
    // this is the encloser of the query
    $cString .= ")";

    return $cString;
	}

	private function detect_type($tipena){
	    $res = "";

	    if($tipena == 'number'){
	        $res = "INT(11)";
	    }else  if($tipena == 'textarea'){
	        $res = "TEXT";
	    }else  if($tipena == 'date'){
	        $res = "DATETIME";
	    }else {
	        $res = "VARCHAR(75)";
	    }

	    return $res;
	}

    public function insert($data){

        $this->db->insert($this->table_name, $data);

        $hasil = true;

        return $hasil;

    }
	
	public function update($data, $id){
		$condition = array('id' => $id);
		
		// data is array
		
		$this->db->where($condition);
        $this->db->update($this->table_name, $data);
		
		if($this->db->affected_rows() >= 1){
			return true;
		}
		
		return false;
		
	}
	
	public function delete($id){

		$this->db->where('id', $id);
        $this->db->delete($this->table_name);

        $rowsAffected = $this->db->affected_rows(); 
		
		if($rowsAffected>=1){
			return true;
		}
		
		return false;
		
	}

	public function delete_all(){

        $this->db->empty_table($this->table_name);

        $rowsAffected = $this->db->affected_rows(); 
		
		if($rowsAffected>=1){
			return true;
		}
		
		return false;
		
	}

   
	
	public function getSpecific($id){

        $data = array(
            'id'             => $id
        );

        // periksa apakah user dengan id ini ada di table?
       
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

       if ($query->num_rows() > 0) {
            return $query->row(); // return only a row
        } 
        
        return false;

    }

    public function getSpecificBy($col, $value){

        $data = array(
            $col => $value
        );

        // periksa apakah user dengan id ini ada di table?
       
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

       if ($query->num_rows() > 0) {
            return $query->row(); // return only a row
        } 
        
        return false;

    }
	
	public function getAll() {
        $query = $this->db->get($this->table_name);
		
		 if ($query->num_rows() > 0) {
            return $query->result(); // Returns an array of objects representing the result set
        } else {
            return false;
        }
		
    }

	

}