<?php

Class Inputdata extends CI_Controller
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
        $data['kabupaten'] = $this->M_inputData->kabupaten();
        $this->template->utama('inputdata/dokumen',$data);
    }

    public function simpanDocument()
    {
        $nama_berkas = $this->input->post('nama_berkas');
        $kabkota = $this->input->post('kabkota');
        $tanggal = $this->input->post('tanggal');
        $data = $this->db->query("SELECT * FROM dokumen WHERE nama='$nama_berkas'")->result();
        $jumlah = count($data);
        if($jumlah == 0)
        {
            $data = array(
                'nama' => $nama_berkas,
                'kabupaten' => $kabkota,
                'tanggal' => $tanggal
            );
            $this->M_inputData->dokumenInput($data);
            
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
                                     $this->M_inputData->uploadData($nama_berkas,$files['name'][$i],$tanggal);
                                     $this->upload->do_upload('dokumen');  
                             } 
            $this->session->set_flashdata('pesan','Data Berhasil Di Inputkan');
            redirect('dokumen');
        }else{
            $this->session->set_flashdata('error','Data Telah Ada..!!!');
            redirect('dokumen');
        }
    }

    public function foto()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $data['kabupaten'] = $this->M_inputData->kabupaten();
        $this->template->utama('inputdata/foto',$data);
    }

    public function simpanFoto()
    {
        $nama_berkas = $this->input->post('nama_berkas');
        $kabkota = $this->input->post('kabkota');
        $tanggal = $this->input->post('tanggal');
        $data = array(
            'nama' => $nama_berkas,
            'kabupaten' => $kabkota,
            'tanggal' => $tanggal
        );
        $this->M_inputData->fotoInput($data);
        
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
                                 $this->M_inputData->uploadFoto($nama_berkas,$files['name'][$i],$tanggal);
                                 $this->upload->do_upload('foto');  
                         }  
        $this->session->set_flashdata('pesan','Data Berhasil Di Inputkan');
        redirect('foto');
    }

    public function koordinat()
    {
        $data['user'] =$this->db->GET_WHERE('pengguna',['nik' => $this->session->userdata('nik')])->row_array();
        $this->template->utama('inputdata/koordinat',$data);
    }

    public function tambahKoordinat()
    {
        //$this->template->utama('Inputdata/koordinat');

        $nama_situs = $this->input->post('nama_situs');
        $latitude = $this->input->post('latitude');
        $longtitude = $this->input->post('longtitude');

        $data = array(
            'koordinat_nama_situs' => $nama_situs,
            'koordinat_latitude' => $latitude,
            'koordinat_longtitude' => $longtitude
        );

        $this->M_inputData->tambahKoordinat($data);
        $this->session->set_flashdata('pesan', 'Tambah Koordinat Berhasil');
        redirect('koordinat');
    }

    

}