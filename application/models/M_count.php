<?php
Class M_count Extends CI_Model
{
    public function hitungUploadFile()
    {
        $awal = date("Y-01-01");
        $akhir = date("Y-12-t");
        $sql = "SELECT grafik.* FROM (select COUNT(id) AS jumlah,
        LEFT(DATE_FORMAT(tanggal, '%M'),3) as bulan, YEAR(tanggal) AS tahun, tanggal from file_dokumen
         group by left(tanggal, 7)
        union 
        select COUNT(id) AS jumlah,
        LEFT(DATE_FORMAT(tanggal, '%M'), 3) as bulan, YEAR(tanggal) AS tahun, tanggal  from file_foto group by left(tanggal, 7)) grafik 
        WHERE grafik.tanggal >= DATE('".$awal."') AND grafik.tanggal <= DATE('".$akhir."')";

        return $data = $this->db->query($sql)->result();
    }

    public function HitungBerdasarkanBulan($awal,$akhir)
    {
        $sql = "SELECT grafik.* FROM (select COUNT(id) AS jumlah,
        LEFT(DATE_FORMAT(tanggal, '%M'),3) as bulan, YEAR(tanggal) AS tahun, tanggal from file_dokumen
         group by left(tanggal, 7)
        union 
        select COUNT(id) AS jumlah,
        LEFT(DATE_FORMAT(tanggal, '%M'), 3) as bulan, YEAR(tanggal) AS tahun, tanggal  from file_foto group by left(tanggal, 7)) grafik 
        WHERE grafik.tanggal >= DATE('".$awal."') AND grafik.tanggal <= DATE('".$akhir."')";

        return $data = $this->db->query($sql)->result();
    }

    public function hitungDownloadFile()
    {
        $awal = date("Y-01-01");
        $akhir = date("Y-12-t");
        $sql = "SELECT grafiks.* FROM (select COUNT(id) AS jumlah,
        LEFT(DATE_FORMAT(tanggal, '%M'),3) as bulan, YEAR(tanggal) AS tahun, tanggal from download
         group by left(tanggal, 7)) grafiks 
        WHERE grafiks.tanggal >= DATE('".$awal."') AND grafiks.tanggal <= DATE('".$akhir."')";

        return $data = $this->db->query($sql)->result();
    }

    public function HitungBerdasarkanDownload($awal,$akhir)
    {
        $sql = "SELECT grafiks.* FROM (select COUNT(id) AS jumlah,
        LEFT(DATE_FORMAT(tanggal, '%M'),3) as bulan, YEAR(tanggal) AS tahun, tanggal from download
         group by left(tanggal, 7)) grafiks 
        WHERE grafiks.tanggal >= DATE('".$awal."') AND grafiks.tanggal <= DATE('".$akhir."')";

        return $data = $this->db->query($sql)->result();
    }
}