<?php
class M_cagarAlam extends CI_Model
{
    public function tampilCagarAlam()
    {
        return $this->db->get('data_cagar_budaya')->result();
    }
    public function tampilProvinsi()
    {
        return $this->db->get('tb_prov')->result();
    }

    public function getKabkota($id)
	{
		return $this->db->query("SELECT * FROM tb_kabkota WHERE id_prov='$id'")->result();
    }
    public function getKecamatan($id)
    {
        return $this->db->query("SELECT * FROM tb_kecamatan WHERE id_kabkota='$id'")->result();
    }
    public function getKelurahan($id)
    {
        return $this->db->query("SELECT * FROM tb_kelurahan WHERE id_kec='$id'")->result();
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

