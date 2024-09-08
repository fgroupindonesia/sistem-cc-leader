<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBUser extends CI_Model {

    private $table_name = "table_users";

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

    public function get_avatar_by_id($id){

        // mengambil avatar terbaru
        $data = array(
            'id'             => $id
        );

        $result = '';
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

        if($query){
            $rest = $query->row();

            $result = $rest->avatar;

        } 
        
        return $result;


    }

    public function update_avatar($dataArray){

        $this->db->where('id', $dataArray['id']);
        $this->db->update($this->table_name, $dataArray);
        
        return $this->db->affected_rows();

    }

    public function update_avatar_session(){
        $this->akses->update_avatar();
        redirect('/settings');
    }

    public function verifikasi($nama_panggilan, $pass){

        $data = array(
            'nama_panggilan'    => $nama_panggilan,
            'pass'              => $pass
        );

        // periksa apakah user dan pass ini ada di table user?
        $valid = false;
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

        if($query){
            $rest = $query->result();

            foreach($rest as $row){
				
                $valid = true;
				break;
            }

        } else { 
            $valid = false;
        }
        
        return $valid;

    }

    public function getBy($needed, $col, $val){

        $data = array(
            $col             => $val
        );

        // periksa apakah user dan pass ini ada di table user?
        $result = '';
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

        if($query){
            $rest = $query->result();

            foreach($rest as $row){
                $result = $row->$needed;
                
                break;
            }

        } 
        
        return $result;

    }

	public function getByEmail($col, $email){

        $data = array(
            'email'             => $email
        );

        // periksa apakah user dan pass ini ada di table user?
        $result = '';
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

        if($query){
            $rest = $query->result();

            foreach($rest as $row){
				$result = $row->$col;
				
				break;
            }

        } 
        
        return $result;

    }
	
	public function getSpecific($id){

        $data = array(
            'id'             => $id
        );

        // periksa apakah user dengan id ini ada di table?
       
        $this->db->where($data);
        $query = $this->db->get($this->table_name);

       if ($query->num_rows() > 0) {
            return $query->row(); 
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

    public function getSpecificByFilter($arrayIn){

       
        $this->db->where($arrayIn);
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

	public function getAll() {
        $query = $this->db->get($this->table_name);
		
		 if ($query->num_rows() > 0) {
            return $query->result(); // Returns an array of objects representing the result set
        } else {
            return false;
        }
		
    }

	public function getTotalData() {
        // Replace 'your_table_name' with the actual name of your database table
        $total_records = $this->db->count_all($this->table_name);
        return $total_records;
    }

}