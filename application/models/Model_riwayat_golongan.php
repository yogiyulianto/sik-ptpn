<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_riwayat_golongan extends CI_model{

    
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
		$this->db->from('riwayat_golongan a'); 
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
		$query = $this->db->get_where("riwayat_golongan", $where);
        if($query){
            return $query->row();
        }else{
            return false;
        }

	}

	public function get_by_karyawan_id($where)
    {
		$query = $this->db->get_where("riwayat_golongan", $where);
        if($query){
            return $query->result_array();
        }else{
            return false;
        }

	}
	
	public function simpan($data)
    {

        $query = $this->db->insert("riwayat_golongan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

	}
	
	public function hapus($id)
    {

        $query = $this->db->delete("riwayat_golongan", $id);

        if($query){
            return true;
        }else{
            return false;
        }

	}
	
	public function update($data, $id)
    {
        $query = $this->db->update("riwayat_golongan", $data, array('riwayat_golongan_id' => $id));

        if($query){
            return true;
        }else{
            return false;
        }

    }
}
