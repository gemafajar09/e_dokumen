<?php

Class Informasi extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
        $this->load->model('M_informasi');
	}

    public function kelolaInformasi()
    {
        $data['user'] = $this->db->GET_WHERE('pengguna', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['informasi'] = $this->M_informasi->tampilInformasi();
        $this->template->utama('informasi/index', $data);
    }

    public function editInformasi()
    {
        $id = $this->input->post('id_info');
        echo json_encode($this->M_informasi->getBerita($id));
    }

    public function tambahInformasi()
    {
        if ($this->input->post('id_berita') == NULL) {


            $judul = $this->input->post('judul');
            $nama_penerbit = $this->input->post('nama_penerbit');
            $tanggal = $this->input->post('tanggal');
            $deskripsi = $this->input->post('deskripsi');
            $foto = $this->_upgambar();
            $data = array(
                'judul' => $judul,
                'nama_penerbit' => $nama_penerbit,
                'tanggal' => $tanggal,
                'deskripsi' => $deskripsi,
                'foto'    => $foto
            );
            $this->M_informasi->gambarInput($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Inputkan');
        } else {
            $id = $this->input->post('id_berita');
            $judul = $this->input->post('judul');
            $nama_penerbit = $this->input->post('nama_penerbit');
            $tanggal = $this->input->post('tanggal');
            $deskripsi = $this->input->post('deskripsi');
            //$foto = $this->_egambar();

            if (!empty($_FILES['foto']['name'])) {
                $foto = $this->_upgambar();
            } else {
                $foto = $this->input->post('foto_lama');
            }
            $data = array(
                'judul' => $judul,
                'nama_penerbit' => $nama_penerbit,
                'tanggal' => $tanggal,
                'deskripsi' => $deskripsi,
                'foto'    => $foto
            );

            $where = array(
                'id_berita' => $id
            );
            $this->M_informasi->editInformasi($data, $where);
            $this->session->set_flashdata('pesan', 'Edit Data Berhasil');
        }
        redirect('informasi');
    }
    public function hapusInformasi($id)
    {
        $row = $this->M_informasi->getBerita($id);
        unlink("./upload/gambar/" . $row[0]->foto);
        $this->M_informasi->hapusInformasi($id);
        $this->session->set_flashdata('pesan', 'Data ' . $id . ' Telah Dihapus');
        redirect('informasi');
    }

    private function _upgambar(){
        $id = $this->input->post('id_berita');
        $row = $this->M_informasi->getBerita($id);
        unlink("./upload/gambar/" . $row[0]->foto);
        
        $config['upload_path']          = './upload/gambar';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = uniqid();
        $config['overwrite']			= true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);



        if ($this->upload->do_upload('foto')) {
        return $this->upload->data("file_name");
        }

        return "default.png";
    }
}
