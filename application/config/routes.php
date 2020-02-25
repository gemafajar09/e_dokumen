<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['logout']['post'] = 'Admin/logout';

$route['register']['get'] = 'Admin/register';
$route['daftar']['post'] = 'Admin/daftar';
$route['halaman']['get'] = 'Admin/halaman';

$route['kelola_akun']['get'] = 'Admin/kelolaAkun';
$route['tambah_akun']['POST'] = 'Admin/tambahAkun';
$route['edit_akun']['POST'] = 'Admin/editAkun';
$route['hapus_akun/(:num)']['GET'] = 'Admin/hapusAkun/$1';

$route['dokumen']['get'] = 'Inputdata/dokumen';
$route['simpanDocument']['post'] = 'Inputdata/simpanDocument';
$route['foto']['get'] = 'Inputdata/foto';
$route['inputFoto']['post'] = 'Inputdata/simpanFoto';
$route['koordinat']['get'] = 'Inputdata/koordinat';
$route['tkoordinat']['POST'] = 'Inputdata/tambahKoordinat';
// dokumen
$route['pdokumen']['get'] = 'Pencariandata/dokumen';
$route['editDokumen']['post'] = 'Pencariandata/editDokumen';
$route['tampilFile']['post'] = 'Pencariandata/tampilFile';
$route['hapusDokumen/(:num)']['get'] = 'Pencariandata/hapusDokumen/$1';
$route['hapusFileD/(:num)']['get'] = 'Pencariandata/hapusFileD/$1';
$route['updateFileDokumen']['post'] = 'Pencariandata/updateFileDokumen';
// foto
$route['pfoto']['get'] = 'Pencariandata/foto';
$route['editFoto']['post'] = 'Pencariandata/editFoto';
$route['tampilFileF']['post'] = 'Pencariandata/tampilFileF';
$route['hapusFoto/(:num)']['get'] = 'Pencariandata/hapusFoto/$1';
$route['hapusFileF/(:num)']['get'] = 'Pencariandata/hapusFileF/$1';
$route['updateFileFoto']['post'] = 'Pencariandata/updateFileFoto';

$route['pkoordinat']['get'] = 'Pencariandata/tampilKoordinat';
$route['ekoordinat']['POST'] = 'Pencariandata/editKoordinat';
$route['hkoordinat/(:num)']['GET'] = 'Pencariandata/hapusKoordinat/$1';

$route['informasi']['get'] = 'Informasi/kelolaInformasi';
$route['tambah_informasi']['POST'] = 'Informasi/tambahInformasi';
$route['edit_informasi']['POST'] = 'Informasi/editInformasi';
$route['hapus_informasi/(:num)']['GET'] = 'Informasi/hapusInformasi/$1';

$route['laporanUpload']['get'] = 'Laporan/index';