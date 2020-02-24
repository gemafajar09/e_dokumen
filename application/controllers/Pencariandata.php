<?php

Class Pencariandata extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
        $this->load->model('M_inputData');
	}

    public function dokumen()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $data['dokumen'] = $this->M_inputData->tampilDokumen();
        $this->template->utama('pencariandata/dokumen',$data);
    }

    public function foto()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $data['foto'] = $this->M_inputData->tampilFoto();
        $this->template->utama('pencariandata/foto',$data);
    }

    public function tampilKoordinat()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $data['koordinat'] = $this->M_inputData->tampilKoordinat();
        $this->template->utama('pencariandata/koordinat',$data);
    }

    public function editKoordinat()
    {
        $koordinat_id = $this->input->post('koordinat_id');
        $nama_situs = $this->input->post('nama_situs');
        $latitude = $this->input->post('latitude');
        $longtitude = $this->input->post('longtitude');

        $data = array(
            'koordinat_nama_situs' => $nama_situs,
            'koordinat_latitude' => $latitude,
            'koordinat_longtitude' => $longtitude
        );

        $this->M_inputData->editKoordinat($koordinat_id, $data);
        $this->session->set_flashdata('pesan', 'Edit Data Berhasil');
        redirect('pkoordinat');
    }
    public function hapusKoordinat($koordinat_id)
    {
        $this->M_inputData->hapusKoordinat($koordinat_id);
        $this->session->set_flashdata('pesan', 'Data ' . $koordinat_id . ' Telah Dihapus');
        redirect('pkoordinat');
    }

    

}