<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBHistoryFormulir extends CI_Model {

	private $table_name = "table_history_formulir";

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

        $this->db->delete($this->table_name);

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
	
	public function getAllLimitBy($numeric) {
        
        $this->db->limit($numeric);

        $query = $this->db->get($this->table_name);
        
         if ($query->num_rows() > 0) {
            return $query->result(); // Returns an array of objects representing the result set
        } else {
            return false;
        }
        
    }


	public function getAllLimitSortBy($numeric, $descAsc) {
        
        $this->db->limit($numeric);
        $this->db->order_by('id', $descAsc);

        $query = $this->db->get($this->table_name);
        
         if ($query->num_rows() > 0) {
            return $query->result(); // Returns an array of objects representing the result set
        } else {
            return false;
        }
        
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