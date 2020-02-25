<?php
Class Laporan Extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('Template');
    }

    public function index()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $this->template->utama('laporan/laporanUpload',$data);
    }
}