<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class batih extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_batih'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$batih_id = $this->uri->segment(3);
        $data = array(

            'title'     => 'Data Batih',
            'batih' => $this->Model_batih->get_by_karyawan_id($batih_id)
		);

        $this->load->view('cari_batih', $data);
	}
	
	public function edit($batih_id)
	{
		$where = array(
			'batih_id' => $batih_id
		);
		$data = array(
			'title' 	=> 'Edit Data Batih',
			'detail' => $this->Model_batih->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		$this->load->view('edit_batih', $data);
	}

	public function update()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$id = $this->input->post("batih_id");

		if($this->input->post("foto")) {
			$data = array(
				'karyawan_id' 		=> $this->input->post("karyawan_id"),
				'nama_batih'=> $this->input->post("batih_id"),
				'status_batih'         => $this->input->post("status_batih"),
				'jenis_kelamin'		    => $this->input->post("jenis_kelamin"),
				'tempat_lahir'	        => $this->input->post("tempat_lahir"),
				'tanggal_lahir'	    => $this->input->post("tanggal_lahir"),
				'golongan_darah'	    => $this->input->post("golongan_darah"),
				'keterangan'	    => $this->input->post("keterangan"),
				'foto'	    => $this->input->post("foto")
			);	
		} else {
			$data = array(
				'karyawan_id' 		=> $this->input->post("karyawan_id"),
				'nama_batih'=> $this->input->post("batih_id"),
				'status_batih'         => $this->input->post("status_batih"),
				'jenis_kelamin'		    => $this->input->post("jenis_kelamin"),
				'tempat_lahir'	        => $this->input->post("tempat_lahir"),
				'tanggal_lahir'	    => $this->input->post("tanggal_lahir"),
				'golongan_darah'	    => $this->input->post("golongan_darah"),
				'keterangan'	    => $this->input->post("keterangan"),
			);
		};
        $this->Model_batih->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('batih/');
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
            'batih' => $this->Model_batih->get_by_karyawan_id($where),
			'detail' => $search,
		);
		print_r($where);

        $this->load->view('tambah_batih', $data);
    }

    public function simpan()
    {
        $data = array(

            'batih_id'				=> $this->input->post("batih_id"),
            'karyawan_id' 			=> $this->input->post("karyawan_id"),
            'nama_batih'			=> $this->input->post("nama_batih"),
            'status_batih'         	=> $this->input->post("status_batih"),
            'jenis_kelamin'		    => $this->input->post("jenis_kelamin"),
            'tempat_lahir'	        => $this->input->post("tempat_lahir"),
            'tanggal_lahir'	    	=> $this->input->post("tanggal_lahir"),
            'golongan_darah'	    => $this->input->post("golongan_darah"),
            'keterangan'	    	=> $this->input->post("keterangan"),
            'foto'	    			=> $this->aksi_upload(),
		);

        $this->Model_batih->simpan($data);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('batih/');

    }
    
    public function aksi_upload(){
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('foto')){
			$message = "Upload foto gagal";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else{
			$data = $this->upload->data();
			return $data['file_name'];
		}
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
				redirect("batih/tambah");
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Data tidak ditemukan didatabase.
												</div>');
				redirect("batih/");
			}
	}
	
	public function hapus($id)
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);// yo penak e pie pak? :v
		$where = array(
			'batih_id' => $id
		);

		$this->Model_batih->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('batih/');

    }

}
