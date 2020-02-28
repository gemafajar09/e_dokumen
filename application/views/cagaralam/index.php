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
                            <h4>Kelola Cagar Budaya</h4>
                            <button type="button" data-toggle="modal" data-target="#tambah_informasi" class="btn btn-primary">Tambah Data</button>
                            <br>
                            <hr>
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">No</th>
                                        <th>Kode QR</th>
                                        <th>Nama</th>
                                        <th>Kab/Kota</th>
                                        <th>Provinsi</th>
                                        <th>Tanggal</th>
                                        <th style="width:190px;text-align: center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cagaralam as $no => $row) : ?>
                                        <tr>
                                            <td><?php echo $no + 1; ?></td>
                                            <td>
                                                <!-- <?php //$kode2 = $row->kode_qr; 
                                                        ?> -->
                                                <img src="<?php echo base_url('assets/images/' . $row->kode_qr) ?>">
                                            </td>
                                            <td><?php echo $row->nama_objek; ?></td>
                                            <td><?php echo $row->nama_kabkota; ?></td>
                                            <td><?php echo $row->nama_provinsi; ?></td>
                                            <td><?php echo tanggal($row->tanggal); ?></td>
                                            <td>
                                                <button type="button" style="width: 70px" onclick="ambilDataInformasi('<?php echo $row->kode_qr ?>')" class="btn btn-success">Edit</button>
                                                <a href="<?php echo base_url('hapus_informasi/' . $row->kode_qr) ?>" class="btn btn-danger">Hapus</a>
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
            </div>
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah_informasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <center>
                        <h3>Data Cagar Budaya</h3>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="form1" method="POST" action="<?php echo base_url('tambah_informasi'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Cover</label>
                                    <input type="file" class="form-control" name="foto[]" id="foto" placeholder="Cover">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Nama Objek</label>
                                    <input type="hidden" name="id_cagar" id="id_cagar">
                                    <input type="text" class="form-control" name="nama_objek" id="nama_objek" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">No Inventaris</label>
                                    <input type="text" class="form-control" name="no_inventaris" id="no_inventaris" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="" class="form-label">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option>Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $a) : ?>
                                            <option value="<?= $a->id_prov ?>"><?= $a->nama_provinsi ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="" class="form-label">Kabupaten/Kota</label>
                                    <select name="kabkota" class="form-control" id="kabkota">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="" class="form-label">Kecamatan</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="" class="form-label">Kelurahan</label>
                                    <select name="kelurahan" class="form-control" id="kelurahan"></select>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Dusun</label>
                                    <input type="text" class="form-control" name="dusun" id="dusun" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Jalan</label>
                                    <input type="text" class="form-control" name="jalan" id="jalan" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Letak Geografis</label>
                                    <textarea name="letak_geo" class="ckeditor" cols="10" rows="10">
                                    </textarea>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Letak Astronomis</label>
                                    <textarea name="letak_astronomis" class="ckeditor" cols="10" rows="10">
                                    </textarea>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Aksesibilitas Situs</label>
                                    <textarea name="aksesibilitas_situs" class="ckeditor" cols="10" rows="10">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Deskripsi Historis</label>
                                    <textarea name="deskripsi_historis" class="ckeditor" cols="10" rows="10">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Deskripsi Arkeologis</label>
                                    <textarea name="deskripsi_arkeologis" class="ckeditor" cols="10" rows="10">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Lahan</label>
                                    <textarea name="deskripsi_arkeologis" class="ckeditor" cols="10" rows="10">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Batas Utara</label>
                                    <input type="text" class="form-control" name="batas_utara" id="batas_utara" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Batas Selatan</label>
                                    <input type="text" class="form-control" name="batas_selatan" id="batas_selatan" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Batas Barat</label>
                                    <input type="text" class="form-control" name="batas_barat" id="batas_barat" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Batas Timur</label>
                                    <input type="text" class="form-control" name="batas_timur" id="batas_timur" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Fungsi Dahulu dan Sekarang</label>
                                    <input type="text" class="form-control" name="fungsi_lama_dan_sekarang" id="fungsi_lama_dan_sekarang" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Pemilik</label>
                                    <input type="text" class="form-control" name="pemilik" id="pemilik" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Pengelola</label>
                                    <input type="text" class="form-control" name="pengelola" id="pengelola" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Denah</label>
                                    <input type="file" class="form-control" name="denah" id="denah" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Tanggal Berdiri</label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="form-label">Tanggal Entry</label>
                                    <input type="date" class="form-control" name="tgl_entry" id="tgl_entry" placeholder="">
                                </div>
                            </div>
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
        function ambilDataInformasi(id) {
            $.ajax({
                url: '<?= base_url('edit_informasi') ?>',
                type: 'POST',
                data: 'id_info=' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    document.getElementById('id_berita').value = data[0].id_berita;
                    document.getElementById('judul').value = data[0].judul;
                    document.getElementById('nama_penerbit').value = data[0].nama_penerbit;
                    document.getElementById('tanggal').value = data[0].tanggal;
                    CKEDITOR.instances.editor1.setData(data[0].deskripsi);
                    document.getElementById('foto_lama').value = data[0].foto;
                    $("#tambah_informasi").modal('show');
                }
            })
        }

        function ambilKabKota()
        {
            var provinsi= document.getElementById("provinsi").value;
            $.ajax({
                type : 'POST',
                url : '<?= base_url('cagaralam/carikabkota') ?>',
                data : 'id_prov='+provinsi,
                success: function(response){
                    $('#kabkota').html(response);
                },
                error: function(){
                    alert('error');
                }

            });
        }
        document.getElementById("provinsi").addEventListener("change", ambilKabKota);

        function ambilKecamatan(){
            var kabkota = document.getElementById("kabkota").value;
            $.ajax({
                type : 'POST',
                url : '<?= base_url('cagaralam/carikecamatan') ?>',
                data : 'id_kabkota='+kabkota,
                success :  function(response){
                    $('#kecamatan').html(response);
                },
                error : function(){
                    alert('error');
                }
            });
        }
        document.getElementById("kabkota").addEventListener("change",ambilKecamatan);

        function ambilKelurahan(){
            var kecamatan = document.getElementById("kecamatan").value;
            $.ajax({
                type : 'POST',
                url : '<?= base_url('cagaralam/carikelurahan') ?>',
                data : 'id_kec='+kecamatan,
                success : function(response){
                    $('#kelurahan').html(response);
                },
                error : function(){
                    alert('error');
                }
            });
        }   
        document.getElementById("kecamatan").addEventListener("change",ambilKelurahan); 

    </script>