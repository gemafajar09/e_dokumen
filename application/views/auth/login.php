<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Document | Log in</title>

    <link rel="stylesheet" href="<?= base_url() ?>asset/skp/libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/skp/libraries/fontawesome/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600|Playfair+Display:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>asset/skp/styles/main.css">
</head>

<body style="background-image: url('asset/skp/images/back.jpg')">
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
    <?php  }

       if($this->session->flashdata('error')== TRUE){
        $error = $this->session->flashdata('error'); 
    ?>
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
           <script type="text/javascript">
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '<?= $error ?>'
                })   
           </script>
    <?php
       }
        if($this->session->flashdata('local')== TRUE){
        $local = $this->session->flashdata('local'); 
    ?>
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
           <script type="text/javascript">
                Swal.fire(
                  'PERINGATAN!!',
                  '<?= $local ?>',
                  'question'
                )   
           </script>
    <?php } ?>
    <!-- Main Login -->
    <div class="container section-login">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header login-header text-center">
                        <img src="<?= base_url() ?>asset/skp/images/tutwuri.svg" class="my-3" width="120">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= base_url('Admin/index') ?>" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="mx-auto">Silahkan Masuk untuk Melanjutkan</label>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" name="nik" autocomplete="nik" placeholder="NIK" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
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