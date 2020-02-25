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
<?php }elseif($this->session->flashdata('error')== TRUE){
$error = $this->session->flashdata('error'); 
?>
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
           <script type="text/javascript">
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?= $error ?>'
                })   
           </script>
<?php } ?>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6 thumbnail">
            <div class="card">
              <div class="card-body">
                <h4>Input Dokumen</h4><hr>
                <form action="<?= base_url('simpanDocument') ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Berkas</label>
                    <div class="col-sm-8">
                      <input type="text" required class="form-control" name="nama_berkas">
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
                      <input type="date" required class="form-control" name="tanggal">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Berkas</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" multiple name="dokumen[]">
                      <i style="color : red; font-size: 15px;">*format Pdf dengan Ukuran Max 15 Mb</i>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12" align="center">
                      <button type="submit" class="btn btn-primary"><i> SIMPAN</i></button>
                      <button type="reset" class="btn btn-warning"><i> RESET</i></button>
                    </div>
                  </div>
                </form>  

          </div>      
        </div>