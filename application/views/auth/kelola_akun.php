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
								<h3>Kelola Data Akun</h3>
								<a href="<?php echo base_url('tambah_akun') ?>" data-toggle="modal" data-target="#tambah_akun" class="btn btn-primary">Tambah Data</a>
								<br><hr>
								<table id="example1" class="table table-hover">
									<thead>
										<tr>
											<th style="width: 20px">No</th>
											<th>Nama</th>
											<th>NIK</th>
											<th>Jabatan</th>
											<th>Email</th>
											<th style="width:190px;text-align: center">Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($akun as $no => $row) : ?>
											<tr>
												<td><?php echo $no + 1; ?></td>
												<td><?php echo $row->nama; ?></td>
												<td><?php echo $row->nik; ?></td>
												<td><?php echo $row->jabatan; ?></td>
												<td><?php echo $row->email; ?></td>
												<td>
													<button type="button" style="width: 70px" onclick="ambilDataAkun('<?php echo $row->id ?>')" class="btn btn-success">Edit</button>

													<a href="<?php echo base_url('hapus_akun/' . $row->id) ?>" class="btn btn-danger">Hapus</a>
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
			</form>
		</div>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah_akun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
					<h3>Data Akun</h3>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="form1" method="POST" action="<?php echo base_url('tambah_akun'); ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="hidden" name="id_akun" id="id_akun">
							<input type="text" class="form-control" name="nama" id="nama">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Nik</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nik" id="nik">
							<input type="hidden" class="form-control" name="id_jabatan" id="id_jabatan">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Jabatan</label>
						<div class="col-sm-8">
							<select name="jabatan" id="jabatan" class="form-control">
								<?php foreach ($jabatan as $no => $row) : ?>
									<option value="<?php echo $row->id_jabatan ?>"><?php echo $row->jabatan; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="email" name="email">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label">Password </label>
						<div class="col-sm-8">
						<i style="font-size:10px; color:red;" id="note" ></i> 
							<input type="password" class="form-control" id="password" name="password">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12" align="center">
							<button type="submit" class="btn btn-primary" name="simpan" value="SIMPAN"><i> SIMPAN</i></button>
							<button type="reset" class="btn btn-warning" name="reset" value="RESET"><i> RESET</i></button>
						</div>
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
	function ambilDataAkun(id) {
		$.ajax({
			url: '<?= base_url('edit_akun') ?>',
			type: 'POST',
			data: 'id_pengguna=' + id,
			dataType: 'json',
			success: function(data) {
				console.log(data);
				document.getElementById('id_akun').value = data[0].id;
				document.getElementById('nama').value = data[0].nama;
				document.getElementById('nik').value = data[0].nik;
				document.getElementById('jabatan').value = data[0].id_jabatan;
				document.getElementById('email').value = data[0].email;
				document.getElementById('id_jabatan').value = data[0].id_jabatan;
				document.getElementById('note').innerHTML = "*abaikan jika tidak ingin ganti password";
				$("#tambah_akun").modal('show');
			}
		})
	}
</script>