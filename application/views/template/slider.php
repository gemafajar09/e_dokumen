<header class="nav-header responsive">
<div style="width: 90%; margin: auto">
  <div class="d-flex align-items-center">
    <div>
      <img src="<?= base_url() ?>asset/skp/images/tutwuri.svg" width="60" style=" margin-left: 1rem !important;" class="my-3 ml-5">
    </div>
    <div class="ml-2 my-6" style="width:1200px; text-align: center;">
      <span class="head">E-Document</span> <br>
      <span class="subhead">Balai Pelestarian Cagar Budaya Sumatera Barat</span>
    </div>
    <div>
      <img src="<?= base_url() ?>asset/skp/images/cagar.png"  width="60" style=" margin-left: 1rem !important;" class="my-3 ml-5">
    </div>
  </div>
</div>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('halaman') ?>">Beranda</a>
        </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Input Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url('dokumen') ?>">Document</a>
              <a class="dropdown-item" href="<?= base_url('foto') ?>">Foto</a>
              <a class="dropdown-item" href="<?= base_url('koordinat') ?>">Kordinat</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pencarian Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url('pdokumen') ?>">Document</a>
              <a class="dropdown-item" href="<?= base_url('pfoto') ?>">Foto</a>
              <a class="dropdown-item" href="<?= base_url('pkoordinat') ?>">Kordinat</a>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kelola_akun') ?>">Kelola Akun</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('informasi') ?>">Informasi</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?module=logharianpenilai/view">Daftar Cagar Alam</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?module=logharianpenilai/view">Laporan</a>
          </li>

        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0">
        <span class="mr-2 d-none d-lg-inline small text-white">
          Anda Masuk Sebagai <i style="color:red;"><b><?= $user['nama'] ?></b></i>
        </span>
        </ul>
      </form>

    </div>
  </div>
</nav>