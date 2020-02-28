<?php
if ($this->session->flashdata('pesan') == TRUE) {
  $pesan = $this->session->flashdata('pesan');
?>
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <script type="text/javascript">
    Swal.fire(
      'Berhasil!',
      '<?= $pesan ?>',
      'success'
    )
  </script>
<?php } ?>

      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <h4>Kelola Informasi</h4>
              <button type="button" data-toggle="modal" data-target="#tambah_informasi" class="btn btn-primary"><i class="fa fa-plus-circle"></i>Tambah Data</button>
              <br>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 20px">No</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th style="width:75px;text-align: center">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($informasi as $no => $row) : ?>
                    <tr>
                      <td><?php echo $no + 1; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td><?php echo $row->nama_penerbit; ?></td>
                      <td><?php echo tanggal($row->tanggal); ?></td>
                      <td><?php
                          $kalimat = $row->deskripsi;
                          $cetak = substr($kalimat, 0, 200);
                          //var_dump($cetak);
                          $p = strlen($kalimat);
                          //                                echo $p;
                          if ($p <= 200) {
                            echo $cetak;
                          } elseif ($p > 200) {
                            echo $cetak . ".....";
                          }

                          ?>
                      </td>
                      <td> <img src="<?php echo base_url('upload/gambar/' . $row->foto) ?>" alt="-" style="width: 100px; height: 100px;"> </td>
                      <td>
                        <button type="button" onclick="ambilDataInformasi('<?php echo $row->id_berita ?>')" class="btn btn-success"><i class="fa fa-edit"></i></button>
                        <a href="<?php echo base_url('hapus_informasi/' . $row->id_berita) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-1">
          </div>
        </div>
      </div>

<div class="row">
    <div class="col-md-4">
      <!-- Modal Tambah -->
      <div class="modal fade" id="tambah_informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <center>
                <h3>Data Informasi</h3>
              </center>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form name="form1" method="POST" action="<?php echo base_url('tambah_informasi'); ?>" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="hidden" name="id_berita" id="id_berita">
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nama_penerbit" id="nama_penerbit" placeholder="Penerbit">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="hidden" name="foto_lama" id="foto_lama">
                    <input type="file" class="form-control" name="foto" id="foto">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <textarea name="deskripsi" class="ckeditor" id="ckeditor"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12" align="center">
                    <button type="submit" class="btn btn-primary" name="simpan" value="SIMPAN"><i> SIMPAN</i></button>
                    <button type="reset" class="btn btn-warning" name="reset" value="RESET"><i style="color:white"> RESET</></button>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">

            </div>

          </div>
        </div>
      </div>
    </div>
</div>

  <script type="text/javascript">
    function ambilDataInformasi(id) {
      $.ajax({
        url: '<?= base_url('edit_informasi') ?>',
        type: 'POST',
        data: 'id_info=' + id,
        dataType: 'json',
        success: function(data) {
          console.log(data);
          document.getElementById('id_berita').value = data[0].id_berita;
          document.getElementById('judul').value = data[0].judul;
          document.getElementById('nama_penerbit').value = data[0].nama_penerbit;
          document.getElementById('tanggal').value = data[0].tanggal;
          CKEDITOR.instances.ckeditor.setData(data[0].deskripsi);
          document.getElementById('foto_lama').value = data[0].foto;
          $("#tambah_informasi").modal();
        }
      })
    }
  </script>