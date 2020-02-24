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
<div class="row py-3">
    <div class="col-md-12">
      <div class="row">
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body bg-warning">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body bg-success">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body bg-primary">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              </div>
            </div>
          </div>
          <!--  -->
        </div>
    </div>
    <div class="col-md-6 py-3">
        <div class="card">
          <div class="card-body">
            <table class="table-hover">
              <a href=""> <h4>Judul Berita</h4></a>
              <tr>
                <td rowspan="2">
                  <img src="<?= base_url('asset/skp/images/back.jpg') ?>" width="180px">
                </td>
                <td><i class="btn btn-success">Nama Penerbit</i></td>
              </tr>
              <tr>
                <td><i>Isi Berita aaaaaaa aaaaaaaaa aaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaa aaaaaaaaaaa aaaaaaaaaa</i></td>
              </tr>
            </table>
          </div>
        </div>
    </div>  
    <div class="col-md-6 py-3">
        <div id="grafik"></div>
    </div>  
</div>