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
  <div class="col-md-10 thumbnail">
    <div class="card">
      <div class="card-body">
        <h4>Data Koordinat</h4><hr>
        <table id="example1" class="table table-hover">
          <thead>
            <tr>
              <th style="width: 20px">No</th>
              <th>Nama Situs</th>
              <th>Latitude</th>
              <th>Longtitude</th>
              <th style="width:190px;text-align: center">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($koordinat as $no => $row) : ?>
              <tr>
                <td><?php echo $no + 1 ?></td>
                <td><?php echo $row->koordinat_nama_situs; ?></td>
                <td><?php echo $row->koordinat_latitude; ?></td>
                <td><?php echo $row->koordinat_longtitude; ?></td>
                <td>
                  <button type="button" data-toggle="modal" style="width: 70px" data-target="#edit_koordinat" onclick="ambilDataKoordinat('<?php echo $no ?>')" class="btn btn-success">Edit</button>

                  <a href="<?php echo base_url('hkoordinat/' . $row->koordinat_id) ?>" class="btn btn-danger">Hapus</a>

                  <!--               <?php echo anchor('Pencariandata/hapus_koordinat/' . $row->koordinat_id, '<i class="fa fa-trash btn btn-danger"></i>', array('onclick' => "return confirm('Yakin Hapus?')")); ?> -->

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

  <!-- Modal Edit -->
  <div class="modal fade" id="edit_koordinat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
            <h3>Edit Koordinat</h3>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form name="form" method="POST" action="<?= base_url('ekoordinat') ?>" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Nama Situs</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control" name="koordinat_id">
                <input type="text" class="form-control" name="nama_situs">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Latitude</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="latitude">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Longtitude</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="longtitude">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary" name="submit" value="SIMPAN"><i> SIMPAN</i></button>
                <button type="reset" class="btn btn-warning" name="reset" value="RESET"><i> RESET</i></button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">

        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    function ambilDataKoordinat(id) {
      var data_koordinat = <?= json_encode($koordinat) ?>;
      var data_terpilih = data_koordinat[id];
      console.log(data_terpilih);
      document.getElementsByName("koordinat_id")[0].value = data_terpilih.koordinat_id;
      document.getElementsByName("nama_situs")[0].value = data_terpilih.koordinat_nama_situs;
      document.getElementsByName("latitude")[0].value = data_terpilih.koordinat_latitude;
      document.getElementsByName("longtitude")[0].value = data_terpilih.koordinat_longtitude;
      $("#edit_koordinat").show();
    }
  </script>