<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class riwayatjabatan extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_riwayat_jabatan'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$riwayat_jabatan_id = $this->uri->segment(3);
        $data = array(

            'title'     => 'Data Jenjang',
            'jenjang' => $this->Model_riwayat_jabatan->get_by_karyawan_id($riwayat_jabatan_id),
		);

        $this->load->view('cari_riwayat_jabatan', $data);
	}
	
	public function edit($riwayat_jabatan_id)
	{
		$where = array(
			'riwayat_jabatan_id' => $riwayat_jabatan_id
		);
		$data = array(
			'title' 	=> 'Edit riwayat jabatan',
			'detail' => $this->Model_riwayat_jabatan->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		$this->load->view('edit_riwayat_jabatan', $data);
	}

	public function update()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$id = $this->input->post("riwayat_jabatan_id");
        $data = array(
			'karyawan_id' 		=> $this->input->post("karyawan_id"),
            'nama_jabatan'				=> $this->input->post("nama_jabatan"),
            'tanggal_mulai_menjabat'      => $this->input->post("tanggal_mulai_menjabat"),
            'tanggal_selesai_menjabat'	  => $this->input->post("tanggal_selesai_menjabat"),

        );

        $this->Model_riwayat_jabatan->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('riwayatjabatan/');
    }

    public function tambah()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		
		$where = array(
			'karyawan_id' => $search['karyawan_id']
		);

		$data = array(
			'rs_search' => $search,
            'title'     => 'Jenjang By Karyawan Id',
            'jenjang' => $this->Model_riwayat_jabatan->get_by_karyawan_id($where),
			'detail' => $search,
		);

        $this->load->view('tambah_riwayat_jabatan', $data);
    }

    public function simpan()
    {
        $data = array(

            'riwayat_jabatan_id'		=> $this->input->post("riwayat_jabatan_id"),
            'karyawan_id' 				=> $this->input->post("karyawan_id"),
            'nama_jabatan'				=> $this->input->post("nama_jabatan"),
            'tanggal_mulai_menjabat'      => $this->input->post("tanggal_mulai_menjabat"),
            'tanggal_selesai_menjabat'	  => $this->input->post("tanggal_selesai_menjabat"),
        );

        $this->Model_riwayat_jabatan->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('riwayatjabatan/');

	}
	
	function search()
    {

        if ($this->input->post('search', true) == "tampilkan") {
		$karyawan = $this->Model_karyawan->edit($this->input->post('search_karyawan_id', true));
		$params = array(
			'karyawan_id' => $karyawan->karyawan_id,
			'karyawan_nama' => $karyawan->karyawan_nama,
		);
        $this->session->set_userdata(self::SESSION_SEARCH, $params);
        } else {
        $this->session->unset_userdata(self::SESSION_SEARCH);
		}
		if($karyawan->karyawan_id!=null){
			redirect("riwayatjabatan/tambah");
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Data tidak ditemukan didatabase.
											</div>');
			redirect("riwayatjabatan/");
		}
	}
	
	public function hapus($id) // jenjang pak , itu salah
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);// yo penak e pie pak? :v
		$where = array(
			'riwayat_jabatan_id' => $id
		);

		$this->Model_riwayat_jabatan->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('riwayatjabatan/');

    }

}
