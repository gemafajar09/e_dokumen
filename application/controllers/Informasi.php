<?php

Class Informasi extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
	}

    public function informasi()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $this->template->utama('informasi/index',$data);
    }

}