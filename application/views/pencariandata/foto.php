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
          <div class="col-md-1">
          </div>
  	 	    <div class="col-md-10 thumbnail">
            <div class="card">
              	<div class="card-body">
		            <h4>Data Foto</h4><hr>
		       		    <table id="example1" class="table table-hover responsive">
					 	    <thead>
							    <tr>
									<th style="width: 20px">No</th>
									<th>Nama Berkas</th>
									<th>Kabupaten/Kota</th>
									<th>Tahun</th>
									<th style="width:60px;text-align: center">Opsi</th>
								</tr>
							</thead>
							<tbody>
              <?php foreach($foto as $i => $a): ?>
								<tr>
									<td>
                    <button data-toggle="collapse" type="button" href="#collapseExample<?= $i ?>" role="button" class="btn btn-success  btn-sm" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus"></i></button>
                  </td>
									<td><?= $a->nama ?></td>
									<td><?= $a->kabupaten ?></td>
									<td><?= tanggal($a->tanggal) ?></td>
									<td>
										<button type="button" onclick="editFoto('<?= $a->id_foto ?>')" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
										<a href="<?= base_url('hapusFoto/'.$a->id_foto) ?>" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
              </tbody>
              <tr>
                  <td colspan="5">
                  <div class="collapse" id="collapseExample<?= $i ?>">
                      <div class="card card-body">
                        <table class="table-striped">
                        <?php $data = $this->db->query("SELECT * FROM file_foto where nama_berkas = '$a->nama'")->result();
                        foreach($data as $b): ?>
                          <tr>
                            <td><?= $b->file ?></td>
                            <td style="width:80px; text-align:center">
                            <a href="<?= base_url('upload/dokumen/'.$b->file) ?>" target="blank" class="btn btn-success  btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="<?= base_url('Pencariandata/downloadFoto/'.$b->id) ?>" class="btn btn-warning  btn-sm"><i class="fa fa-download"></i></a>
                            </td>
                          </tr>
                        <?php endforeach ?>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach ?>
              
						</table>	
		        </div>
      		</div>
          <div class="col-md-1">
          </div>
        </div>  

<!-- Modal Edit -->
<div class="modal fade" id="edit_foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                  	<h4>Edit Foto</h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form name="form1" method="POST" action="<?= base_url('updateFileFoto') ?>" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label">Nama Berkas</label>
                <div class="col-sm-8">
                <input type="hidden" name="id" id="id_foto">
                  <input type="text" id="nama_berkas" class="form-control" name="nama_berkas">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label">Kabupaten/Kota</label>
                <div class="col-sm-8">
                  <select name="kabkota" id="kabkota" class="form-control">
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
                  <input type="date" id="tanggal" class="form-control" name="tanggal">
                </div>
              </div>
              <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Berkas</label>
                    <div class="col-sm-8">
                    <span style="color:red; font-size:10px">*jika tidak ada upload file baru kosongkan saja.</span>
                      <input type="file" class="form-control" multiple name="foto[]">
                      <i style="color : red; font-size: 10px;">*format Zip dengan Ukuran Max 5 Mb</i>
                    </div>
                  </div>
              <div class="form-group row">
                <div class="col-sm-12" align="center">
                  <button type="submit" class="btn btn-primary" name="simpan" value="SIMPAN"><i> SIMPAN</i></button>
                  <button type="reset" class="btn btn-warning" name="reset" value="RESET"><i> RESET</i></button>
                </div>
              </div>
            </form> 
            <div class="card">
                  <div class="card-body">
                    <table class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>File</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="files"></tbody>
                    </table>
                  </div>
              </div>

            </div>

        </div>
    </div>
</div>
<script src="<?= base_url() ?>asset/skp/libraries/jquery/jquery-3.4.1.min.js"></script>
<script>
function ambilBerkas(nama_berkas)
{
      $.ajax({
        url:"<?= base_url('tampilFileF') ?>",
        method: "POST",
        data:{'nama_berkas':nama_berkas},
        success:function(data){
          console.log(data)
          $('#files').html(data);
          $('#edit_foto').modal();
        }
      });
      
}

function editFoto(id)
{
  $.ajax({
    url : '<?= base_url('editFoto') ?>',
    type: 'POST',
    data : {'id_foto': id},
    dataType: 'json',
    success: function(data)
    {
      document.getElementById('id_foto').value = data[0].id_foto;
      document.getElementById('nama_berkas').value = data[0].nama;
      document.getElementById('kabkota').value = data[0].kabupaten;
      document.getElementById('tanggal').value = data[0].tanggal;
      
      ambilBerkas(data[0].nama);

      
    }
  });
}

</script>


