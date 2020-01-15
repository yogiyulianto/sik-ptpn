<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class foto extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('Model_foto'); 
        $this->load->model('Model_karyawan'); 

    }

    public function index()
    {
		$foto_id = $this->uri->segment(3);
        $data = array(

            'title'     => 'Data Foto',
            'Foto' => $this->Model_foto->get_by_karyawan_id($foto_id)
		);

        $this->load->view('cari_foto', $data);
	}
	
	public function edit($foto_id)
	{
		$where = array(
			'batih_id' => $foto_id
		);
		$data = array(
			'title' 	=> 'Edit Data Foto',
			'detail' => $this->Model_foto->edit($where),
			'karyawan' => $this->Model_karyawan->get_all(),
		);
		$this->load->view('edit_foto', $data);
	}

	public function update()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$id = $this->input->post("batih_id");

		if($this->input->post("foto")) {
			$data = array(
				'karyawan_id' 		=> $this->input->post("karyawan_id"),
				'lokasi_foto' 		=> $this->input->post("lokasi_foto"),
			);	
		} else {
			$data = array(
				'karyawan_id' 		=> $this->input->post("karyawan_id"),
				'lokasi_foto' 		=> $this->input->post("lokasi_foto")
			);
		};
        $this->Model_foto->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('foto/');
    }

    public function tambah()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);

		$data = array(
			'rs_search' => $search,
            'title'     => 'Foto By Karyawan Id',
            'batih' => $this->Model_foto->get_by_karyawan_id($search['karyawan_id']),
			'detail' => $search,
		);
		// print_r($where);

        $this->load->view('tambah_foto', $data);
    }

    public function simpan()
    {
		$search = $this->session->userdata(self::SESSION_SEARCH);
		$batih = $this->Model_foto->get_by_karyawan_id($search['karyawan_id']);

        $data = array(
            'karyawan_id' 			=> $search['karyawan_id'],
            'lokasi_foto'			=> $this->_upload_foto(),
		);

		if($batih->lokasi_foto == null) {
			$this->Model_foto->simpan($data);
		}else{
			$this->Model_foto->update(array('lokasi_foto' => $data['lokasi_foto']), $data['karyawan_id']);
		}

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('foto/');

    }
    
    public function _upload_foto(){
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
			redirect("foto/tambah");
	}
	
	public function hapus($id)
    {
        $search = $this->session->userdata(self::SESSION_SEARCH);// yo penak e pie pak? :v
		$where = array(
			'foto_id' => $id
		);

		$this->Model_foto->hapus($where);
		
		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil dihapus didatabase.
                                                </div>');

        //redirect
        redirect('foto/');

    }

}
