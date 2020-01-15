<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	const SESSION_SEARCH = 'search_karyawan';
	
	public function __construct(){

        parent ::__construct();

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Karyawan',

		);
		// $search = $this->session->userdata(self::SESSION_SEARCH);
        $this->load->view('home', $data);
	}
	function library(){
		$this->load->view('library');
	}

}
