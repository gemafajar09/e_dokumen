<?php
Class Laporan Extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('Template');
        $this->load->model('M_count');
    }

    public function index()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $data['grafik'] = $this->M_count->hitungUploadFile();
        $this->template->utama('laporan/laporanUpload',$data);
    }

    public function carigrafik()
    {
            $awal = $this->input->post('tanggal_awal');
            $akhir = $this->input->post('tanggal_akhir');
            $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
            $data['grafik'] = $this->M_count->HitungBerdasarkanBulan($awal,$akhir);
            $this->template->utama('laporan/laporanUpload',$data);
    }

    public function hitungDownload()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $data['grafik'] = $this->M_count->hitungDownloadFile();
        $this->template->utama('laporan/laporanDownload',$data);
    }

    public function carigrafikDownload()
    {
            $awal = $this->input->post('tanggal_awal');
            $akhir = $this->input->post('tanggal_akhir');
            $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
            $data['grafik'] = $this->M_count->HitungBerdasarkanDownload($awal,$akhir);
            $this->template->utama('laporan/laporanDownload',$data);
    }
}