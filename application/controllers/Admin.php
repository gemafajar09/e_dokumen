<?php

Class Admin extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('template');
        $this->load->library('session');
        $this->load->model('M_admin');
        $this->load->library('pagination');
        $this->load->model('M_informasi');
	}
// awal login
    public function index()
    {
		$this->form_validation->set_rules('nik','Nik','required|trim');
            $this->form_validation->set_rules('password','Password','required|trim');
            if($this->form_validation->run()==false)
            {
                $this->load->view('auth/login');
            } else {
                $nik = $this->input->POST('nik');
            	$password = $this->input->POST('password');
            	$user = $this->db->GET_WHERE('pengguna',['nik'=> $nik])->row_array();
                    if($user['nik']== $nik)
                    {
                        if(password_verify($password, $user['password']))
                        {
                            if($user['id_jabatan']== 3)
                            {
                               $data =[
                                'nik' => $user['nik'],
                            ];
                            $this->session->set_userdata($data);
                            $this->session->set_flashdata('pesan','Selamat Datang Admin.');
                            redirect('halaman');
                            }
                            elseif($user['id_jabatan']== 2)
                            {
                               $data =[
                                'nik' => $user['nik'],
                            ];
                            $this->session->set_userdata($data);
                            $this->session->set_flashdata('pesan','Selamat Datang Struktural.');
                            redirect('halaman');
                            }
                            elseif($user['id_jabatan']== 1)
                            {
                               $data =[
                                'nik' => $user['nik'],
                            ];
                            $this->session->set_userdata($data);
                            $this->session->set_flashdata('pesan','Selamat Datang Staf.');
                            redirect('halaman');
                            }
                        }
                        else
                        {
                            $this->session->set_flashdata('error','Password Salah');
                            redirect('Admin');
                        } 
                            
                    }
                    else
                    {
                        $this->session->set_flashdata('error','Username Salah');
                            redirect('Admin');
                    }

                }
    }

    public function register()
    {
        $data['jabatan'] = $this->M_admin->jabatan();
        $this->load->view('auth/registrasi',$data);
    }

    public function daftar()
    {
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $jabatan = $this->input->post('jabatan');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'nama' => $nama,
            'nik' => $nik,
            'id_jabatan' => $jabatan,
            'email' => $email,
            'password' => $pass
        );
            $this->M_admin->daftar($data);
            $this->session->set_flashdata('pesan','Pendaftaran Berhasil');
            redirect('Admin');
        
    }

    public function halaman()
    {
        $config['base_url'] = 'http://localhost/E-document/Admin/halaman';
        $config['total_rows'] = $this->db->count_all('berita');
        $config['per_page'] = 2;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['user'] = $this->db->GET_WHERE('pengguna', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['informasi'] = $this->M_informasi->tampilInformasi2($config['per_page'], $data['start']);
        $this->template->utama('home', $data);
    }

    public function kelolaAkun()
    {
        $data['user'] = $this->db->GET_WHERE('pengguna', ['nik' => $this->session->userdata('nik')])->row_array();
        $data['akun'] = $this->M_admin->tampilAkun();
        $data['jabatan'] = $this->M_admin->tampilJabatan();
        $this->template->utama('auth/kelola_akun', $data);
    }
    public function editAkun()
    {
        $id = $this->input->post('id_pengguna');
        echo json_encode($this->M_admin->getPengguna($id));
    }
    public function tambahAkun()
    {
        if ($this->input->post('id_akun') == NULL) {
            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            $jabatan = $this->input->post('jabatan');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'nama' => $nama,
                'nik' => $nik,
                'id_jabatan' => $jabatan,
                'email' => $email,
                'password' => $pass
            );
            $this->M_admin->daftar($data);
            $this->session->set_flashdata('pesan', 'Tambah Data Berhasil');
        } else {
            $id = $this->input->post('id_akun');
            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            if ($jabatan = $this->input->post('jabatan') == NULL) {
                $jabatan = $this->input->post('id_jabatan');
            } else {
                $jabatan = $this->input->post('jabatan');
            }
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);

            $data = array(
                'nama' => $nama,
                'nik' => $nik,
                'id_jabatan' => $jabatan,
                'email' => $email,
                'password' => $pass
            );
            $where = array(
                'id' => $id
            );
            $this->M_admin->editAkun($data, $where);
            $this->session->set_flashdata('pesan', 'Edit Data Berhasil');
        }
        redirect('kelola_akun');
    }
    public function hapusAkun($id)
    {
        $this->M_admin->hapusAkun($id);
        $this->session->set_flashdata('pesan', 'Data ' . $id . ' Telah Dihapus');
        redirect('kelola_akun');
    }
  	
// penutup
    public function logout()
    {
        $this->session->unset_userdata(array('nik','password'));
        $this->session->set_flashdata('pesan','Anda Telah Logout.');
        redirect('Admin');
    }

}