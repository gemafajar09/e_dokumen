	<form name="form1" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-1">
          </div>
  	 	    <div class="col-md-10 thumbnail">
            <div class="card">
              	<div class="card-body">
		            <h4>Data Foto</h4><hr>
		       		    <table id="example1" class="table table-hover">
					 	    <thead>
							    <tr>
									<th style="width: 20px">No</th>
									<th>Nama Berkas</th>
									<th>Kabupaten/Kota</th>
									<th>Tahun</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
              <?php foreach($foto as $i => $a): ?>
								<tr>
									<td>
                    <button data-toggle="collapse" type="button" href="#collapseExample<?= $i ?>" role="button" class="btn btn-success btn-sm" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus"></i></button>
                  </td>
									<td><?= $a->nama ?></td>
									<td><?= $a->kabupaten ?></td>
									<td><?= tanggal($a->tanggal) ?></td>
									<td>
										<a href="<?php echo base_url() ?>edokumen" data-toggle="modal" style="width: 70px" data-target="#edit_dokumen" class="btn btn-success btn-sm">Edit</a>
										<a href="" class="btn btn-danger btn-sm">Hapus</a>
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
                            <td style="width:80px; text-align:center"><a href="<?= base_url('upload/foto/'.$b->file) ?>" class="btn btn-success"><i class="fa fa-download"></i></a></td>
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
	</form>

<!-- Modal Edit -->
<div class="modal fade" id="edit_foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                  	<h3>Edit Foto</h3>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form name="form1" method="POST" enctype="multipart/form-data">
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
                  <input type="file" class="form-control" name="berkas">
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
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>



