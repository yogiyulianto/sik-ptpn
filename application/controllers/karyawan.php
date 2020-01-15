<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
		$this->load->model('Model_karyawan'); 
		$this->load->model('Model_jenjang'); 
		$this->load->model('Model_riwayat_jabatan'); 
		$this->load->model('Model_kursus_umum'); 
		$this->load->model('Model_rewards'); 
		$this->load->model('Model_riwayat_golongan'); 
		$this->load->model('Model_pengalaman_organisasi'); 
		$this->load->model('Model_batih'); 
    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Karyawan',
            'data_karyawan' => $this->Model_karyawan->get_all(),

		);
		// $search = $this->session->userdata(self::SESSION_SEARCH);
        $this->load->view('data_karyawan', $data);
    }

    public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data Karyawan'

        );

        $this->load->view('tambah_karyawan', $data);
    }

    public function simpan()
    {
        $data = array(

            'karyawan_id'				=> $this->input->post("karyawan_id"),
            'karyawan_nama'				=> $this->input->post("karyawan_nama"),
            'karyawan_alamat'			=> $this->input->post("karyawan_alamat"),
			'karyawan_kontak'			=> $this->input->post("karyawan_kontak"),
			'karyawan_suku'				=> $this->input->post("karyawan_suku"),
			'karyawan_tempat_lahir'   	=> $this->input->post("karyawan_tempat_lahir"),
			'karyawan_tanggal_lahir'   	=> $this->input->post("karyawan_tanggal_lahir"),
			'karyawan_status'   		=> $this->input->post("karyawan_status"),
			'karyawan_golongan_darah'   => $this->input->post("karyawan_golongan_darah"),
			'karyawan_bagian_kebun'   	=> $this->input->post("karyawan_bagian_kebun"),
			'karyawan_jabatan'   		=> $this->input->post("karyawan_jabatan"),
			'karyawan_golongan'   		=> $this->input->post("karyawan_golongan"),
			'karyawan_awal_masuk'   	=> $this->input->post("karyawan_awal_masuk"),
			'karyawan_pengangakatan'   	=> $this->input->post("karyawan_pengangakatan"),
			'karyawan_pensiun'   		=> $this->input->post("karyawan_pensiun"),
			'karyawan_status_perkawinan'=> $this->input->post("karyawan_status_perkawinan"),
			'keterangan'   				=> $this->input->post("keterangan"),
			'karyawan_susunan_keluarga'	=> $this->input->post("karyawan_susunan_keluarga"),
			'karyawan_nomor_dapenbun'   => $this->input->post("karyawan_nomor_dapenbun"),
			'karyawan_nomor_bpjs'   	=> $this->input->post("karyawan_nomor_bpjs"),
			'karyawan_status_tanggal'   => $this->input->post("karyawan_status_tanggal"),
			'karyawan_nama_ahli_waris'  => $this->input->post("karyawan_nama_ahli_waris"),
			'karyawan_jenis_kelamin_ahli_waris' 	=> $this->input->post("karyawan_jenis_kelamin_ahli_waris"),
			'karyawan_hubungan_ahli_waris'   		=> $this->input->post("karyawan_hubungan_ahli_waris"),

        );

        $this->Model_karyawan->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('karyawan/');

	}
	
	public function get_data_by_karyawan_id(){
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$karyawan_id = $search['karyawan_id'];
		$where = array(
			'karyawan_id' => $search['karyawan_id']
		);

		$data = array(
			'kursus' => $this->Model_kursus_umum->get_by_karyawan_id($where),
			'jenjang' => $this->Model_jenjang->get_by_karyawan_id($where),
			'jabatan' => $this->Model_riwayat_jabatan->get_by_karyawan_id($where),
			'rewards' => $this->Model_rewards->get_by_karyawan_id($where),
			'golongan' => $this->Model_riwayat_golongan->get_by_karyawan_id($where),
			'organisasi' => $this->Model_pengalaman_organisasi->get_by_karyawan_id($where),
			'batih' => $this->Model_batih->get_by_karyawan_id($where),
            'title'     => 'Karyawan By ID',
            'data_karyawan' => $this->Model_karyawan->edit($karyawan_id)

		); 
		if($this->Model_karyawan->edit($karyawan_id)!=null){
			$this->load->view('data_karyawan_by_id', $data);
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! data tidak ditemukan!
												</div>');
			redirect('/karyawan');
		}
		
	}

    public function edit($karyawan_id)
    {
        $karyawan_id = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Karyawan',
            'data_karyawan' => $this->Model_karyawan->edit($karyawan_id)

        );

        $this->load->view('edit_karyawan', $data);
    }

    public function update()
    {
        $id['karyawan_id'] = $this->input->post("karyawan_id");
        $data = array(

            'karyawan_id'       => $this->input->post("karyawan_id"),
            'karyawan_nama'				=> $this->input->post("karyawan_nama"),
            'karyawan_alamat'			=> $this->input->post("karyawan_alamat"),
			'karyawan_kontak'			=> $this->input->post("karyawan_kontak"),
			'karyawan_suku'				=> $this->input->post("karyawan_suku"),
			'karyawan_tempat_lahir'   	=> $this->input->post("karyawan_tempat_lahir"),
			'karyawan_tanggal_lahir'   	=> $this->input->post("karyawan_tanggal_lahir"),
			'karyawan_status'   		=> $this->input->post("karyawan_status"),
			'karyawan_golongan_darah'   => $this->input->post("karyawan_golongan_darah"),
			'karyawan_bagian_kebun'   	=> $this->input->post("karyawan_bagian_kebun"),
			'karyawan_jabatan'   		=> $this->input->post("karyawan_jabatan"),
			'karyawan_golongan'   		=> $this->input->post("karyawan_golongan"),
			'karyawan_awal_masuk'   	=> $this->input->post("karyawan_awal_masuk"),
			'karyawan_pengangakatan'   	=> $this->input->post("karyawan_pengangakatan"),
			'karyawan_pensiun'   		=> $this->input->post("karyawan_pensiun"),
			'karyawan_status_perkawinan'=> $this->input->post("karyawan_status_perkawinan"),
			'keterangan'   				=> $this->input->post("keterangan"),
			'karyawan_susunan_keluarga'	=> $this->input->post("karyawan_susunan_keluarga"),
			'karyawan_nomor_dapenbun'   => $this->input->post("karyawan_nomor_dapenbun"),
			'karyawan_nomor_bpjs'   	=> $this->input->post("karyawan_nomor_bpjs"),
			'karyawan_status_tanggal'   => $this->input->post("karyawan_status_tanggal"),
			'karyawan_nama_ahli_waris'  => $this->input->post("karyawan_nama_ahli_waris"),
			'karyawan_jenis_kelamin_ahli_waris' 	=> $this->input->post("karyawan_jenis_kelamin_ahli_waris"),
			'karyawan_hubungan_ahli_waris'   		=> $this->input->post("karyawan_hubungan_ahli_waris")

        );

        $this->Model_karyawan->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('karyawan/');

	}
	
	function search()
    {

        if ($this->input->post('search', true) == "tampilkan") {
        $params = array(
			'karyawan_id'   => $this->input->post('search_karyawan_id', true)
		);
		$this->session->set_userdata(self::SESSION_SEARCH, $params);
		redirect("karyawan/get_data_by_karyawan_id");
        } else {
		$this->session->unset_userdata(self::SESSION_SEARCH);
        }
    }

    public function hapus($karyawan_id)
    {
		$where=array(
			'karyawan_id' => $karyawan_id
		);
		$this->Model_karyawan->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('karyawan/');

    }

}
