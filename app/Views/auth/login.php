<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
     <link href="<?= base_url('/assets/sbadmin2/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('/assets/sbadmin2/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-7 mt-5">
                <div class="card bg-none o-hidden border-0 my-5 text-white" style="background: none;">
                    <div class="text-justify card-body p-0">
                        <h4 style="font-weight: 800;">Sistem Pendukung Keputusan Metode MABAC</h4>
                        <p class="pt-4">
                            Sistem Pendukung Keputusan (SPK) adalah sebuah sistem berbasis komputer dengan antarmuka antara mesin/komputer dan pengguna. SPK ditujukan untuk membantu pembuat keputusan dalam menyelesaikan suatu masalah dalam berbagai level manajemen dan bukan untuk mengganti posisi manusia sebagai pembuat keputusan.
                        </p>
                        <p>
                            Multi-Attributive Border Approximation Area Comparison (MABAC) merupakan salah satu metode sistem pendukung keputusan yang bersifat multikriteria dan dianggap sebagai salah satu metode yang handal dalam pengambilan keputusan rasional.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" id="inputForm" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="username" class="form-label fw-bold">Username</label>
                                            <input type="username" name="username" class="form-control form-control-user"
                                            id="username"
                                            placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label fw-bold">Password</label>
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                        </div>
                                        
                                        <button type="button" id="submitButton" class="btn btn-primary btn-user btn-block" onclick="submitForm()">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>var hostUrl = "<?= base_url('/assets/'); ?>"</script>
    
    <script src="<?= base_url('/assets/sbadmin2/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('/assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('/assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

    <script src="<?= base_url('/assets/sbadmin2/js/sb-admin-2.min.js') ?>"></script>

    <script>var base_url = '<?= base_url(); ?>'</script>
    <?php $uri = current_url(true); ?>
    <?php if(@$ajax) { ?>
        <script src="<?= base_url('assets/js/own-script/ajax/') ?><?= @$ajax . '.js'; ?>"></script>
    <?php } ?>

</body>

</html>