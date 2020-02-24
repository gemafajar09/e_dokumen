<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-skp | Log in</title>

    <link rel="stylesheet" href="<?= base_url() ?>asset/skp/libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/skp/libraries/fontawesome/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600|Playfair+Display:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>asset/skp/styles/main.css">
</head>

<body style="background-image: url('assets/images/back.jpg')">
    <!-- Main Login -->
    <div class="container section-login">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    
                        <img src="<?= base_url() ?>asset/skp/images/tutwuri.svg" class="my-3" width="120">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= base_url('daftar') ?>" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="mx-auto">Silahkan Masuk untuk Melanjutkan</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" required class="form-control" name="nama" autocomplete="nama" placeholder="Nama" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="number" required class="form-control" name="nik" autocomplete="nik" placeholder="NIP / NIK" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <select class="form-control" name="jabatan">
                                        <option value="">-PILIH JABATAN-</option>
                                        <?php foreach($jabatan as $a): ?>
                                            <option value="<?= $a->id_jabatan ?>"><?= $a->jabatan ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="email" required class="form-control" name="email" autocomplete="email" placeholder="Email" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" required type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Login -->
    <script src="<?= base_url() ?>asset/skp/libraries/jquery/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url() ?>asset/skp/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>asset/skp/libraries/retina/retina.min.js"></script>
</body>

</html>