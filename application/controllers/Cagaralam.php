<?php
class Cagaralam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('M_cagarAlam');
    }

    public function cagarAlam()
    {
        $data['user'] = $this->db->GET_WHERE('pengguna', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['cagaralam'] = $this->M_cagarAlam->tampilCagarAlam();
        $data['provinsi'] = $this->M_cagarAlam->tampilProvinsi();
        // $data['kabkota'] = $this->M_cagarAlam->tampilKabkota();
        // $data['kecamatan'] = $this->M_cagarAlam->tampilKecamatan();
        // $data['kelurahan'] = $this->M_cagarAlam->tampilKelurahan();

        $this->template->utama('cagaralam/index', $data);
    }

    public function tambahCagar()
    {
        $cover = $this->input->post('cover');
        $nama_objek = $this->input->post('nama_objek');
        $no_inventaris = $this->input->post('no_inventaris');
        $jalan = $this->input->post('jalan');
        $dusun = $this->input->post('dusun');
        $provinsi =  $this->input->post('provinsi');
        $kabkota =  $this->input->post('kabkota');
        $kecamatan =  $this->input->post('kecamatan');
        $kelurahan =  $this->input->post('kelurahan');
        $letak_geo = $this->input->post('letak_geo');
        $deskripsi_historis = $this->input->post('deskripsi_historis');
        $deskripsi_arkeologis = $this->input->post('deskripsi_arkeologis');
        $lahan = $this->input->post('lahan');
        $batas_utara = $this->input->post('batas_utara');
        $batas_selatan = $this->input->post('batas_selatan');
        $batas_barat = $this->input->post('batas_barat');
        $batas_timur = $this->input->post('batas_timur');
        $fungsi_lama_dan_sekarang = $this->input->post('fungsi_lama_dan_sekarang');
        $pemilik = $this->input->post('pemilik');
        $pengelola = $this->input->post('pengelola');
        $denah = $this->input->post('denah');
        $tanggal = $this->input->post('tanggal');
        $tgl_entry = $this->input->post('tgl_entry');
    }

    public function carikabkota()
    {
        $hasil = "<option value=''>-- Pilih Kabupaten/Kota --</option>";
        $id = $this->input->post('id_prov');
        $data_kota = $this->M_cagarAlam->getKabkota($id);
        foreach($data_kota as $kota)
        {
            $hasil .= "<option value='".$kota->id_kabkota."'>".$kota->nama_kabkota."</option>";
        }
        echo $hasil;
    }
    public function carikecamatan()
    {
        $hasil = "<option value=''>-- Pilih Kecamatan</option>";
        $id = $this->input->post('id_kabkota');
        $data_kecamatan = $this->M_cagarAlam->getKecamatan($id);
        foreach($data_kecamatan as $kecamatan)
        {
            $hasil .= "<option value='".$kecamatan->id_kec."'>".$kecamatan->nama_kec."</option>";
        }
        echo $hasil;
    }

    public function carikelurahan()
    {
        $hasil = "<option value=''>-- Pilih Kelurahan</option>";
        $id = $this->input->post('id_kec');
        $data_kelurahan =  $this->M_cagarAlam->getKelurahan($id);
        foreach($data_kelurahan as $kelurahan)
        {
            $hasil .= "<option value='".$kelurahan->id_kelurahan."'>".$kelurahan->nama_kelurahan."</option>";
        }
        echo $hasil;
    }
}
