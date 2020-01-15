<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kursusumum extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_kursus_umum'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$kursus_umum_id = $this->uri->segment(3);
        $data = array(

            'title'     => 'Data Kursus Umum',
            'jenjang' => $this->Model_kursus_umum->get_by_karyawan_id($kursus_umum_id),
		);

        $this->load->view('cari_kursus_umum', $data);
	}
	
	public function edit($kursus_umum_id)
	{
		$where = array(
			'kursus_umum_id' => $kursus_umum_id
		);
		$data = array(
			'title' 	=> 'Edit kursus umum',
			'detail' => $this->Model_kursus_umum->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		$this->load->view('edit_kursus_umum', $data);
	}

	public function update()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$id = $this->input->post("kursus_umum_id");
        $data = array(
			'karyawan_id' 		=> $this->input->post("karyawan_id"),
            'nama_kursus'				=> $this->input->post("nama_kursus"),
            'penyelenggara'      => $this->input->post("penyelenggara"),
            'tempat'	  => $this->input->post("tempat"),
            'tahun'	  => $this->input->post("tahun"),

        );

        $this->Model_kursus_umum->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('kursusumum/');
    }

    public function tambah()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		
		$where = array(
			'karyawan_id' => $search['karyawan_id']
		);

		$data = array(
			'rs_search' => $search,
            'title'     => 'Kursus Umum By Karyawan Id',
            'jenjang' => $this->Model_kursus_umum->get_by_karyawan_id($where),
			'detail' => $search,
		);

        $this->load->view('tambah_kursus_umum', $data);
    }

    public function simpan()
    {
        $data = array(

            'kursus_umum_id'		=> $this->input->post("kursus_umum_id"),
            'karyawan_id' 				=> $this->input->post("karyawan_id"),
            'nama_kursus'				=> $this->input->post("nama_kursus"),
            'penyelenggara'      => $this->input->post("penyelenggara"),
            'tempat'	  => $this->input->post("tempat"),
            'tahun'	  => $this->input->post("tahun"),
        );

        $this->Model_kursus_umum->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('kursusumum/');

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
			redirect("kursusumum/tambah");
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Data tidak ditemukan didatabase.
											</div>');
			redirect("kursusumum/");
		}
	}
	
	public function hapus($id) // jenjang pak , itu salah
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);// yo penak e pie pak? :v
		$where = array(
			'kursus_umum_id' => $id
		);

		$this->Model_kursus_umum->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('kursusumum/');

    }

}
