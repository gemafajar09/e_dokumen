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
  <div class="col-md-3">
  </div>
  <div class="col-md-6 thumbnail">
    <div class="card">
      <div class="card-body">
        <h4>Input Koordinat</h4><hr>
        <form name="form" method="POST" action="<?= base_url('tkoordinat') ?>" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Nama Situs</label>
            <div class="col-sm-8">
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
              <button type="submit" class="btn btn-primary"><i> SIMPAN</i></button>
              <button type="reset" class="btn btn-warning" name="reset" value="RESET"><i> RESET</i></button>
            </div>
          </div>
        </form>

      </div>
      <div class="col-md-3">
      </div>
    </div>