<?php 
Class M_admin Extends CI_Model
{
	public function daftar($data)
	{
		$this->db->insert('pengguna',$data);
	}

	public function jabatan()
	{
		return $this->db->get_where('jabatan')->result();
	}

	public function tampilAkun()
	{
		// return $this->db->get('tb_koordinat')->result();
		$query = $this->db->query("SELECT * FROM pengguna JOIN jabatan ON pengguna.id_jabatan = jabatan.id_jabatan");
		return $query->result();
	}
	public function tampilJabatan()
	{
		return $this->db->get('jabatan')->result();
	}

	public function getPengguna($id)
	{
		return $this->db->query("SELECT * FROM pengguna JOIN jabatan ON pengguna.id_jabatan = jabatan.id_jabatan WHERE id='$id'")->result();
	}
	public function editAkun($data, $where)
	{
		$this->db->where($where)->update('pengguna', $data);
	}
	public function hapusAkun($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pengguna');
	}
}