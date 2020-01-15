<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class riwayatgolongan extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_riwayat_golongan'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$riwayat_golongan_id = $this->uri->segment(3);
        $data = array(

            'title'     => 'Data Riwayat Golongan',
            'jenjang' => $this->Model_riwayat_golongan->get_by_karyawan_id($riwayat_golongan_id),
		);

        $this->load->view('cari_riwayat_golongan', $data);
	}
	
	public function edit($riwayat_golongan_id)
	{
		$where = array(
			'riwayat_golongan_id' => $riwayat_golongan_id
		);
		$data = array(
			'title' 	=> 'Edit riwayat golongan',
			'detail' => $this->Model_riwayat_golongan->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		$this->load->view('edit_riwayat_golongan', $data);
	}

	public function update()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$id = $this->input->post("riwayat_golongan_id");
        $data = array(
			'karyawan_id' 		=> $this->input->post("karyawan_id"),
            'tahun'				=> $this->input->post("tahun"),
            'golongan'      => $this->input->post("golongan"),
            'berkala'	  => $this->input->post("berkala"),

        );

        $this->Model_riwayat_golongan->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('riwayatgolongan/');
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
            'jenjang' => $this->Model_riwayat_golongan->get_by_karyawan_id($where),
			'detail' => $search,
		);

        $this->load->view('tambah_riwayat_golongan', $data);
    }

    public function simpan()
    {
        $data = array(

            'riwayat_golongan_id'		=> $this->input->post("riwayat_golongan_id"),
            'karyawan_id' 		=> $this->input->post("karyawan_id"),
            'tahun'				=> $this->input->post("tahun"),
            'golongan'      => $this->input->post("golongan"),
            'berkala'	  => $this->input->post("berkala"),
        );

        $this->Model_riwayat_golongan->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('riwayatgolongan/');

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
			redirect("riwayatgolongan/tambah");
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Data tidak ditemukan didatabase.
											</div>');
			redirect("riwayatgolongan/");
		}
	}
	
	public function hapus($id) // jenjang pak , itu salah
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);// yo penak e pie pak? :v
		$where = array(
			'riwayat_golongan_id' => $id
		);

        $this->Model_riwayat_golongan->hapus($where);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');
        //redirect
        redirect('riwayatgolongan/');

    }

}
