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

    public function editDokumen()
    {
        $id = $this->input->post('id_dokumen');
        echo json_encode($this->M_inputData->editDokument($id));
    }

    public function tampilFile()
    {
        $nama = $this->input->post('nama_berkas');
        $data = $this->M_inputData->fileDokumens($nama);
        foreach($data as $i => $isi)
        {
            $no = $i+1;
            echo"
                <tr>
                    <td>".$no."</td>
                    <td>".$isi->file."</td>
                    <td><a href=".base_url('hapusFileD/'.$isi->id)." class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></td>
                </tr>
            ";
        }
    }

    public function hapusDokumen($id)
    {
        $this->M_inputData->hapusDokumens($id);
        $this->session->set_flashdata('pesan', 'Dokumen Berhasil Dihapus');
        redirect('pdokumen');
    }

    public function hapusFileD($id)
    {
        $this->M_inputData->hapusFiled($id);
        $this->session->set_flashdata('pesan','Dokumen Telah Terhapus..');
        redirect('pdokumen');
    }

    public function downloadDokumen($id)
    {
        $data = $this->db->query("SELECT * FROM file_dokumen WHERE id = $id")->result();
        $tanggal = date('Y-m-d');
        $this->db->query("INSERT INTO download (id_dokumens,jumlah_download,tanggal) VALUES ('$id','1','$tanggal')");
        $this->load->helper('download');
        force_download('upload/dokumen/'.$nama = $data[0]->file,NULL);
    }

    public function updateFileDokumen()
    {
        $dokumen = $_FILES['dokumen'];
        if($dokumen == NULL)
        {
            $nama = $this->input->post('nama_berkas');
            $kabupaten = $this->input->post('kabkota');
            $tanggal = $this->input->post('tanggal');

            $baru =  $this->input->post('nama_berkas');
            $where = $this->input->post('id');
            $this->M_inputData->updateDokumen($where,$baru);
            $this->db->query("UPDATE dokumen SET nama='$nama',kabupaten='$kabupaten',tanggal='$tanggal' WHERE id_dokumen='$where'");

            $this->session->set_flashdata('pesan','Update Data Berhasil');
            redirect('pdokumen');
        }else{
            $nama = $this->input->post('nama_berkas');
            $kabupaten = $this->input->post('kabkota');
            $tanggal = $this->input->post('tanggal');

            $baru =  $this->input->post('nama_berkas');
            $where = $this->input->post('id');
            $this->M_inputData->updateDokumen($where,$baru);
            $this->db->query("UPDATE dokumen SET nama='$nama',kabupaten='$kabupaten',tanggal='$tanggal' WHERE id_dokumen='$where'");

            $number_of_files = sizeof($_FILES['dokumen']['tmp_name']);  
                             $files = $_FILES['dokumen'];  
                                     $config=array(  
                                     'upload_path' => './upload/dokumen',
                                     'allowed_types' => 'jpg|jpeg|png|gif|rar|doc|pdf',  
                                     'max_size' => '30720',  
                                    //  'max_width' => '2000',  
                                    //  'max_height' => '2000'  
                                     );  
                             for ($i = 0;$i < $number_of_files; $i++)  
                             {  
                                     $_FILES['dokumen']['name'] = $files['name'][$i];  
                                     $_FILES['dokumen']['type'] = $files['type'][$i];  
                                     $_FILES['dokumen']['tmp_name'] = $files['tmp_name'][$i];  
                                     $_FILES['dokumen']['error'] = $files['error'][$i];  
                                     $_FILES['dokumen']['size'] = $files['size'][$i];  
                                     $this->load->library('upload', $config);  
                                     $this->M_inputData->uploadData($nama,$files['name'][$i],$tanggal);
                                     $this->upload->do_upload('dokumen');  
                             } 

            $this->session->set_flashdata('pesan','Update Data Baru Berhasil');
            redirect('pdokumen');
        }
    }
// Foto
    public function foto()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $data['foto'] = $this->M_inputData->tampilFoto();
        $this->template->utama('pencariandata/foto',$data);
    }

    public function editFoto()
    {
        $id = $this->input->post('id_foto');
        echo json_encode($this->M_inputData->editFoto($id));
    }

    public function tampilFileF()
    {
        $nama = $this->input->post('nama_berkas');
        $data = $this->M_inputData->fileFotos($nama);
        foreach($data as $i => $isi)
        {
            $no = $i+1;
            echo"
                <tr>
                    <td>".$no."</td>
                    <td>".$isi->file."</td>
                    <td><a href=".base_url('hapusFileF/'.$isi->id)." class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></td>
                </tr>
            ";
        }
    }

    public function hapusFoto($id)
    {
        $this->M_inputData->hapusFotos($id);
        $this->session->set_flashdata('pesan', 'Foto Berhasil Dihapus');
        redirect('pfoto');
    }

    public function hapusFileF($id)
    {
        $this->M_inputData->hapusFilef($id);
        $this->session->set_flashdata('pesan','Foto Telah Terhapus..');
        redirect('pfoto');
    }

    public function downloadFoto($id)
    {
        $data = $this->db->query("SELECT * FROM file_foto WHERE id = $id")->result();
        $tanggal = date('Y-m-d');
        $this->db->query("INSERT INTO download (id_dokumens,jumlah_download,tanggal) VALUES ('$id','1','$tanggal')");
        $this->load->helper('download');
        force_download('upload/foto/'.$nama = $data[0]->file,NULL);
    }

    public function updateFileFoto()
    {
        $foto = $_FILES['foto'];
        if($foto == NULL)
        {
            $nama = $this->input->post('nama_berkas');
            $kabupaten = $this->input->post('kabkota');
            $tanggal = $this->input->post('tanggal');

            $baru =  $this->input->post('nama_berkas');
            $where = $this->input->post('id');
            $this->M_inputData->updateFoto($where,$baru);
            $this->db->query("UPDATE foto SET nama='$nama',kabupaten='$kabupaten',tanggal='$tanggal' WHERE id_foto='$where'");

            $this->session->set_flashdata('pesan','Update Data Berhasil');
            redirect('pfoto');
        }else{
            $nama = $this->input->post('nama_berkas');
            $kabupaten = $this->input->post('kabkota');
            $tanggal = $this->input->post('tanggal');

            $baru =  $this->input->post('nama_berkas');
            $where = $this->input->post('id');
            $this->M_inputData->updateFoto($where,$baru);
            $this->db->query("UPDATE foto SET nama='$nama',kabupaten='$kabupaten',tanggal='$tanggal' WHERE id_foto='$where'");

            $number_of_files = sizeof($_FILES['foto']['tmp_name']);  
                         $files = $_FILES['foto'];  
                                 $config=array(  
                                 'upload_path' => './upload/foto',
                                 'allowed_types' => 'jpg|jpeg|png|gif|rar|doc|pdf',  
                                 'max_size' => '30720',  
                                //  'max_width' => '2000',  
                                //  'max_height' => '2000'  
                                 );  
                         for ($i = 0;$i < $number_of_files; $i++)  
                         {  
                                 $_FILES['foto']['name'] = $files['name'][$i];  
                                 $_FILES['foto']['type'] = $files['type'][$i];  
                                 $_FILES['foto']['tmp_name'] = $files['tmp_name'][$i];  
                                 $_FILES['foto']['error'] = $files['error'][$i];  
                                 $_FILES['foto']['size'] = $files['size'][$i];  
                                 $this->load->library('upload', $config);  
                                 $this->M_inputData->uploadFoto($nama,$files['name'][$i],$tanggal);
                                 $this->upload->do_upload('foto');  
                         }  

            $this->session->set_flashdata('pesan','Update Data Berhasil');
            redirect('pfoto');
        }
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