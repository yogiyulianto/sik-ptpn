<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rewards extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_rewards'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$rewards_id = $this->uri->segment(3);
        $data = array(

            'title'     => 'Data Reward & Punisment',
            'jenjang' => $this->Model_rewards->get_by_karyawan_id($rewards_id),
		);

        $this->load->view('cari_rewards', $data);
	}
	
	public function edit($rewards_id)
	{
		$where = array(
			'rewards_id' => $rewards_id
		);
		$data = array(
			'title' 	=> 'Rewards umum',
			'detail' => $this->Model_rewards->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		$this->load->view('edit_rewards', $data);
	}

	public function update()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$id = $this->input->post("rewards_id");
        $data = array(
			'karyawan_id' 		=> $this->input->post("karyawan_id"),
            'kategori'				=> $this->input->post("kategori"),
            'keterangan'      => $this->input->post("keterangan"),
            'perihal'	  => $this->input->post("perihal"),
            'nomor_surat'	  => $this->input->post("nomor_surat"),

        );

        $this->Model_rewards->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('rewards/');
    }

    public function tambah()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		
		$where = array(
			'karyawan_id' => $search['karyawan_id']
		);

		$data = array(
			'rs_search' => $search,
            'title'     => 'Rewards By Karyawan Id',
            'jenjang' => $this->Model_rewards->get_by_karyawan_id($where),
			'detail' => $search,
		);

        $this->load->view('tambah_rewards', $data);
    }

    public function simpan()
    {
        $data = array(

            'rewards_id'		=> $this->input->post("rewards_id"),
            'karyawan_id' 				=> $this->input->post("karyawan_id"),
            'kategori'				=> $this->input->post("kategori"),
            'keterangan'      => $this->input->post("keterangan"),
            'perihal'	  => $this->input->post("perihal"),
            'nomor_surat'	  => $this->input->post("nomor_surat"),
        );

        $this->Model_rewards->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('rewards/');

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
			redirect("rewards/tambah");
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Data tidak ditemukan didatabase.
											</div>');
			redirect("rewards/");
		}
	}
	
	public function hapus($id) // jenjang pak , itu salah
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);// yo penak e pie pak? :v
		$where = array(
			'rewards_id' => $id
		);

		$this->Model_rewards->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('rewards/');

    }

}
