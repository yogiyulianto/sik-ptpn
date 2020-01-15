<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenjangpendidikan extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_jenjang'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$jenjang_id = $this->uri->segment(3);
		print_r($jenjang_id);
        $data = array(

            'title'     => 'Data Jenjang',
            'jenjang' => $this->Model_jenjang->get_by_karyawan_id($jenjang_id),
			//'detail' => $this->Model_jenjang->edit($where),
		);

        $this->load->view('cari_jenjang', $data);
	}
	
	public function edit($jenjang_id)
	{
		$where = array(
			'jenjang_id' => $jenjang_id
		);
		$data = array(
			'title' 	=> 'Edit Data Jenjang',
			'detail' => $this->Model_jenjang->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		// print_r($data);
		// exit();
		$this->load->view('edit_jenjang', $data);
	}

	public function update()
    {
		$id = $this->input->post("jenjang_id");
        $data = array(
			'karyawan_id'				=> $this->input->post("karyawan_id"),
            'jenjang_pendidikan'		=> $this->input->post("jenjang_pendidikan"),
			'institusi'					=> $this->input->post("institusi"),
			'jurusan'					=> $this->input->post("jurusan"),
			'tempat'				   	=> $this->input->post("tempat"),
			'tahun_lulus		'   	=> $this->input->post("tahun_lulus")

        );

        $cekUpdate = $this->Model_jenjang->update($data, $id);
		if ($cekUpdate){
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data gagal diupdate didatabase.
                                                </div>');
		}

        //redirect
        redirect('jenjangpendidikan/');
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
            'jenjang' => $this->Model_jenjang->get_by_karyawan_id($where),
			'detail' => $search,
		);

        $this->load->view('tambah_jenjang', $data);
    }

    public function simpan()
    {
        $data = array(

            'jenjang_id'				=> $this->input->post("jenjang_id"),
            'karyawan_id'				=> $this->input->post("karyawan_id"),
            'jenjang_pendidikan'		=> $this->input->post("jenjang_pendidikan"),
			'institusi'					=> $this->input->post("institusi"),
			'jurusan'					=> $this->input->post("jurusan"),
			'tempat'				   	=> $this->input->post("tempat"),
			'tahun_lulus		'   	=> $this->input->post("tahun_lulus")
        );

        $this->Model_jenjang->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('jenjangpendidikan/');

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
				redirect("jenjangpendidikan/tambah");
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Data tidak ditemukan didatabase.
                                                </div>');
				redirect("jenjangpendidikan/");
			}
	}
	
	public function hapus($id) 
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);
		$where = array(
			'jenjang_id' => $id
		);

		$this->Model_jenjang->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('jenjangpendidikan/');

    }

}
