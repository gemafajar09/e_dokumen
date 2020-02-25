<?php
class M_informasi extends CI_Model
{
    public function tampilInformasi2($limit, $start)
    {
        return $this->db->get('berita', $limit, $start)->result();
    }
    public function tampilInformasi()
    {
        return $this->db->get('berita')->result();
    }

    public function getBerita($id)
    {
        return $this->db->query("SELECT * FROM berita WHERE id_berita='$id'")->result();
    }
    // public function getBeritaId()
    // {
    //     return $this->db->query("SELECT id_berita+1 as id_berita FROM berita ORDER BY id_berita DESC LIMIT 1 ")->result();
    // }
    public function jumlah()
    {
        return $this->db->count_all('berita');
    }
    public function editInformasi($data, $where)
    {
        $this->db->where($where)->update('berita', $data);
    }

    public function gambarInput($data)
    {
        $this->db->insert('berita', $data);
        // $id = $this->db->insert_id();
    }
    public function hapusInformasi($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('berita');
    }
}
