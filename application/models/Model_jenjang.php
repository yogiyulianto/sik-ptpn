<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jenjang extends CI_model{

    
	public function search($karyawan_id)
    {

        $query = $this->db->where("karyawan_id", $karyawan_id)
                ->get("master_karyawan");
        if($query){
            return $query->result_array();
        }else{
            return false;
        }

	}

	public function tambah() {

		$this->db->select('*');
		$this->db->from('jenjang_pendidikan a'); 
		$this->db->join('master_karyawan b', 'b.karyawan_id=a.karyawan_id', 'left');
		$this->db->where('a.karyawan_id','1');
		$query = $this->db->get(); 
        if($query){
            return $query->row_array();
        }else{
            return false;
        }

	}

	public function edit($where)
    {
		$query = $this->db->get_where("jenjang_pendidikan", $where);
        if($query){
            return $query->row();
        }else{
            return false;
        }

	}

	public function get_by_karyawan_id($where)
    {
		$query = $this->db->get_where("jenjang_pendidikan", $where);
        if($query){
            return $query->result_array();
        }else{
            return false;
        }

	}
	
	public function simpan($data)
    {

        $query = $this->db->insert("jenjang_pendidikan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

	}
	
	public function hapus($id)
    {

        $query = $this->db->delete("jenjang_pendidikan", $id);

        if($query){
            return true;
        }else{
            return false;
        }

	}
	
	public function update($data, $id)
    {
        $query = $this->db->update("jenjang_pendidikan", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }
}
