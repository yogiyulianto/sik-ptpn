<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengalamanorganisasi extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_pengalaman_organisasi'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$pengalaman_organisasi = $this->uri->segment(3);
        $data = array(

            'title'     => 'Data pengalaman organisasi',
            'jenjang' => $this->Model_pengalaman_organisasi->get_by_karyawan_id($pengalaman_organisasi),
		);

        $this->load->view('cari_pengalaman_organisasi', $data);
	}
	
	public function edit($pengalaman_organisasi)
	{
		$where = array(
			'pengalaman_organisasi_id' => $pengalaman_organisasi
		);
		$data = array(
			'title' 	=> 'Pengalaman Organisasi',
			'detail' => $this->Model_pengalaman_organisasi->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		$this->load->view('edit_pengalaman_organisasi', $data);
	}

	public function update()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$id = $this->input->post("pengalaman_organisasi_id");
        $data = array(
			'karyawan_id' 		=> $this->input->post("karyawan_id"),
            'organisasi'				=> $this->input->post("organisasi"),
            'tahun_mulai'      => $this->input->post("tahun_mulai"),
            'tahun_selesai'	  => $this->input->post("tahun_selesai"),
            'jabatan'	  => $this->input->post("jabatan"),
            'tujuan_organisasi'	  => $this->input->post("tujuan_organisasi"),

        );

        $this->Model_pengalaman_organisasi->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('pengalamanorganisasi/');
    }

    public function tambah()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		
		$where = array(
			'karyawan_id' => $search['karyawan_id']
		);

		$data = array(
			'rs_search' => $search,
            'title'     => 'pengalaman organisasi By Karyawan Id',
            'jenjang' => $this->Model_pengalaman_organisasi->get_by_karyawan_id($where),
			'detail' => $search,
		);

        $this->load->view('tambah_pengalaman_organisasi', $data);
    }

    public function simpan()
    {
        $data = array(

            'pengalaman_organisasi_id'		=> $this->input->post("pengalaman_organisasi_id"),
            'karyawan_id' 				=> $this->input->post("karyawan_id"),
            'organisasi'				=> $this->input->post("organisasi"),
            'tahun_mulai'      => $this->input->post("tahun_mulai"),
            'tahun_selesai'	  => $this->input->post("tahun_selesai"),
            'jabatan'	  => $this->input->post("jabatan"),
            'tujuan_organisasi'	  => $this->input->post("tujuan_organisasi"),
        );

        $this->Model_pengalaman_organisasi->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('pengalamanorganisasi/');

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
			redirect("pengalamanorganisasi/tambah");
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Data tidak ditemukan didatabase.
											</div>');
			redirect("pengalamanorganisasi/");
		}
	}
	
	public function hapus($id) 
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);
		$where = array(
			'pengalaman_organisasi_id' => $id
		);

		$this->Model_pengalaman_organisasi->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('pengalamanorganisasi/');

    }

}
