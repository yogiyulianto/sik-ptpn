<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_karyawan extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('master_karyawan')
                 ->order_by('karyawan_id', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {

        $query = $this->db->insert("master_karyawan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($karyawan_id)
    {

        $query = $this->db->where("karyawan_id", $karyawan_id)
                ->get("master_karyawan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

	}
	
	public function search($karyawan_id)
    {

        $query = $this->db->where("karyawan_id", $karyawan_id)
                ->get("master_karyawan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("master_karyawan", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

	}
	
	public function get_by_id($rs_search,$number,$offset)
    {
        $this->db->select('*');
        $this->db->from('master_karyawan');
		if (!empty($rs_search['karyawan_id'])) {
		$this->db->where('karyawan_id',$rs_search['karyawan_id']);
		}

			$this->db->limit($number, $offset); 
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$query->free_result();
			return $result;
			}

			return array();
		}

    public function hapus($where)
    {

        $query = $this->db->delete("master_karyawan", $where);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
