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
    
    public function uploadData($nama,$data,$tanggal)
    {
        $this->db->query("INSERT INTO file_dokumen (nama_berkas,file,tanggal) VALUES ('$nama','$data','$tanggal')");
    }

    public function editDokument($id)
    {
        return $this->db->query("SELECT * FROM dokumen WHERE id_dokumen='$id'")->result();
    }

    public function fileDokumens($nama)
    {
        return $this->db->query("SELECT * FROM file_dokumen WHERE nama_berkas='$nama'")->result();
    }

    public function hapusDokumens($id)
    {
        $data = $this->db->query("SELECT * FROM dokumen WHERE id_dokumen='$id'")->result();
        $nama = $data[0]->nama;
        // var_dump($data[0]->nama); exit;
        $this->db->query("DELETE FROM file_dokumen WHERE nama_berkas='$nama'");
        $this->db->query("DELETE FROM dokumen WHERE id_dokumen='$id'");
    }

    public function hapusFiled($id)
    {
        $this->db->query("DELETE FROM file_dokumen WHERE id='$id'");
    }

    public function updateDokumen($where,$baru)
    {
        $data = $this->db->query("SELECT * FROM dokumen WHERE id_dokumen='$where'")->result();
        $nama = $data[0]->nama;
        $fileDoc = $this->db->query("SELECT * FROM file_dokumen WHERE nama_berkas='$nama'")->result();
        foreach($fileDoc as $a)
        {
            $this->db->query("UPDATE file_dokumen SET nama_berkas='$baru' WHERE id=$a->id");
            // echo $a->id;
        }
    }

    // Foto
    public function tampilFoto()
    {
        return $this->db->query("SELECT * FROM foto")->result();
    }
    
    public function fotoInput($a)
    {
        $this->db->insert('foto',$a);
        // $id = $this->db->insert_id();
    }

    public function uploadFoto($nama,$data,$tanggal)
    {
        $this->db->query("INSERT INTO file_foto (nama_berkas,file,tanggal) VALUES ('$nama','$data','$tanggal')");
    }

    public function editFoto($id)
    {
        return $this->db->query("SELECT * FROM foto WHERE id_foto='$id'")->result();
    }

    public function fileFotos($nama)
    {
        return $this->db->query("SELECT * FROM file_foto WHERE nama_berkas='$nama'")->result();
    }

    public function hapusFotos($id)
    {
        $data = $this->db->query("SELECT * FROM foto WHERE id_foto='$id'")->result();
        $nama = $data[0]->nama;
        // var_dump($data[0]->nama); exit;
        $this->db->query("DELETE FROM file_foto WHERE nama_berkas='$nama'");
        $this->db->query("DELETE FROM foto WHERE id_foto='$id'");
    }

    public function hapusFilef($id)
    {
        $this->db->query("DELETE FROM file_foto WHERE id='$id'");
    }

    public function updateFoto($where,$baru)
    {
        $data = $this->db->query("SELECT * FROM foto WHERE id_foto='$where'")->result();
        $nama = $data[0]->nama;
        $fileF = $this->db->query("SELECT * FROM file_foto WHERE nama_berkas='$nama'")->result();
        foreach($fileF as $a)
        {
            $this->db->query("UPDATE file_foto SET nama_berkas='$baru' WHERE id=$a->id");
            // echo $a->id;
        }
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