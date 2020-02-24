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

$route['pdokumen']['get'] = 'Pencariandata/dokumen';

$route['pfoto']['get'] = 'Pencariandata/foto';

$route['pkoordinat']['get'] = 'Pencariandata/tampilKoordinat';
$route['ekoordinat']['POST'] = 'Pencariandata/editKoordinat';
$route['hkoordinat/(:num)']['GET'] = 'Pencariandata/hapusKoordinat/$1';

$route['informasi']['get'] = 'Informasi/informasi';
