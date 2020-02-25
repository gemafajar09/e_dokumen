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
    <?php foreach ($informasi as $no => $row) : ?>
      <div class="card">
        <div class="card-body">
          <table class="table" border="0" width="100%">
            <tr>
              <td colspan="3">
                <a data-toggle="modal" class="pointer" data-target="#berita" onclick="ambilDataBerita('<?php echo $row->id_berita; ?>')">
                  <h4><?php echo $row->judul; ?></h4>
                </a>
              </td>
            </tr>

            <tr>
              <td rowspan="2">
                <img src="<?php echo base_url('upload/gambar/' . $row->foto) ?>" alt="-" style="width: 150px; height: 150px;">
              </td>
              <td>
                <h5 class="btn btn-sm btn-warning"><?php echo $row->nama_penerbit; ?></h5>
                </img>
              <td align="right">
                <h5 class="btn btn-sm btn-primary"><?php echo tanggal($row->tanggal); ?></h5>
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <i><?php
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
                </i>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <br>
    <?php endforeach ?>
    <br>
    <?php echo $this->pagination->create_links(); ?>
  </div>
  <div class="col-md-6 py-3">
    <div id="grafik"></div>
  </div>
</div>


<div class="modal fade" id="berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-lg" role="document">
    <div class="modal-content ">
      <!-- <div class="modal-header">
        <center>
          <h3>Informasi</h3>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form name="form1" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="hidden" name="id_berita" id="id_berita">
              <center>
                <h3 name="judul" id="judul"></h3>
              </center>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="hidden" name="id_berita" id="id_berita">
              <center>
                <img name="foto" id="foto" width="500px" height="240px">
              </center>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <table width="100%">
                <tr>
                  <td>
                    <i>
                      <b>
                        <p name="nama_penerbit" id="nama_penerbit"></p>
                      </b>
                    </i>
                  </td>
                  <td>
                    <i>
                      <b>
                        <p name="tanggal" id="tanggal" style="text-align: right"></p>
                      </b>
                    </i>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <p name="deskripsi" id="deskripsi" cols="30" rows="10">
              </p>
              <!-- <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
              </script> -->
            </div>
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">

      </div> -->

    </div>
  </div>
</div>

<script type="text/javascript">
  function ambilDataBerita(id) {
    $.ajax({
      url: '<?= base_url('edit_informasi') ?>',
      type: 'POST',
      data: 'id_info=' + id,
      dataType: 'json',
      success: function(data) {
        console.log(data);
        document.getElementById('id_berita').innerHTML = data[0].id_berita;
        document.getElementById('judul').innerHTML = data[0].judul;
        document.getElementById('nama_penerbit').innerHTML = data[0].nama_penerbit;
        document.getElementById('tanggal').innerHTML = data[0].tanggal;
        document.getElementById('deskripsi').innerHTML = data[0].deskripsi;
        //CKEDITOR.instances.editor1.setData(data[0].deskripsi);
        document.getElementById('foto').src = '<?= base_url("upload/gambar") ?>/' + data[0].foto;
        $("#berita").modal('show');
      }
    })
  }
</script>