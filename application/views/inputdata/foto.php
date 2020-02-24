<?php
if($this->session->flashdata('pesan')== TRUE){
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
                <h4>Input Foto</h4><hr>
                <form action="<?= base_url('inputFoto') ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Berkas</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nama_berkas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kabupaten/Kota</label>
                    <div class="col-sm-8">
                      <select name="kabkota" class="form-control">
                        <option>Pilih Kab/Kota</option>
                        <option value="Sumbar">Sumatera Barat</option>
                        <option value="Riau">Riau</option>
                        <option value="Kepri">Kep. Riau</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tahun</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="tanggal">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Berkas</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="foto[]" multiple>
                      <i style="color : red; font-size: 15px;">*format Zip dengan Ukuran Max 5 Mb</i>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12" align="center">
                      <button type="submit" class="btn btn-primary" name="simpan" value="SIMPAN"><i> SIMPAN</i></button>
                      <button type="reset" class="btn btn-warning" name="reset" value="RESET"><i> RESET</i></button>
                    </div>
                  </div>
                </form>  

          </div>
          <div class="col-md-3">
          </div>        
        </div>