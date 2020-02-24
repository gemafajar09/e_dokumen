<div class="box">
<div class="box-header">
<div class="box-body">

	<form name="form1" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-10 thumbnail">
          	<div class="card">
              <div class="card-body">
                <h4>Kelola Data Informasi</h4>
	            <a href="<?php echo base_url()?>tambah_informasi" data-toggle="modal" data-target="#tambah_informasi" class="btn btn-primary">Tambah Data</a>
              <hr> 
              <table id="example1" class="table table-hover">
				 	<thead>
						<tr>
							<th style="width: 20px">No</th>
							<th>Judul</th>
							<th>Tanggal Upload</th>
							<th>Isi</th>
							<th>Gambar</th>
							<th style="width:190px;text-align: center">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>1</th>
							<th>test</th>
							<th>test</th>
							<th>test</th>
							<th>test</th>
							<th>
								<button type="button" onclick="editData()" style="width: 70px" class="btn btn-success">Edit</button>
								<a href="" class="btn btn-danger">Hapus</a>
							</th>
						</tr>
					</tbody>
				</table>
				</div>	
          </div>
          <div class="col-md-1">
          </div>
        </div>  
</form>
</div>
</div>
</div>

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
            	<form name="form1" method="POST" enctype="multipart/form-data">
                  <div class="form-group row">
                    <div class="col-sm-12">
                    	<input type="hidden" name="id" id="id_informasi">
                      <input type="text" class="form-control" name="judul" placeholder="Judul">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="date" class="form-control" name="tanggal" placeholder="Tanggal">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <input type="file" class="form-control" name="gambar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <textarea name="isi" id="editor1" rows="10" cols="80"></textarea>
                      <script>
                          // Replace the <textarea id="editor1"> with a CKEditor
                          // instance, using default configuration.
                          CKEDITOR.replace('editor1');
                      </script>
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

<script type="text/javascript">
	function editData()
	{
		$("#tambah_informasi").modal()
	}
</script>