<?php
Class M_inputData Extends CI_Model
{
    public function tampilDokumen()
    {
        return $this->db->query("SELECT * FROM dokumen")->result();
    }
    
    public function dokumenInput($a)
    {
        $this->db->insert('dokumen',$a);
    }
    
    public function uploadData($nama,$data)
    {
        $this->db->query("INSERT INTO file_dokumen (nama_berkas,file) VALUES ('$nama','$data')");
    }

    public function tampilFoto()
    {
        return $this->db->query("SELECT * FROM foto")->result();
    }
    
    public function fotoInput($a)
    {
        $this->db->insert('foto',$a);
        // $id = $this->db->insert_id();
    }

    public function uploadFoto($nama,$data)
    {
        $this->db->query("INSERT INTO file_foto (nama_berkas,file) VALUES ('$nama','$data')");
    }

    public function tampilKoordinat()
    {
        return $this->db->get('tb_koordinat')->result();
    }

    public function tambahKoordinat($data)
    {
        $this->db->insert('tb_koordinat', $data);
    }

    public function editKoordinat($koordinat_id, $data)
    {
        $this->db->where('koordinat_id', $koordinat_id);
        $this->db->update('tb_koordinat', $data);
    }
    public function hapusKoordinat($koordinat_id)
    {
        $this->db->where('koordinat_id', $koordinat_id);
        $this->db->delete('tb_koordinat');
    }
}