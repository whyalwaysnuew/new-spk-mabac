<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url('/assets/sbadmin2/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url('/assets/sbadmin2/css/sb-admin-2.min.css')?>" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-center font-weight-bold">
            <h1>
                PT WIDJAJA ANEKATAS CENTER
            </h1>
        </div>
        
        <div class="d-flex justify-content-center mb-3">
            <h6>Taman Tekno BSD Sektor XI Blok E-3 No.31, Setu, 15314</h6>
        </div>

        <div class="d-flex justify-content-center mb-5">
            <h4>Hasil Akhir Perankingan</h4>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" cellspacing="0">
                <thead class="bg-dark text-white">
                    <tr align="center">
                        <th>Alternatif</th>
                        <th>Nilai</th>
                        <th width="15%">Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=1;
                        foreach ($data as $keys): ?>
                            <tr align="center">
                                <td align="left">
                                    <?php
                                    $nama_alternatif = $perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
                                    echo $nama_alternatif['nama'];
                                    ?>
                                
                                </td>
                                <td><?= $keys->nilai ?></td>
                                <td><?= $no; ?></td>
                            </tr>
                    <?php
                        $no++;
                        endforeach ?>
                </tbody>
            </table>
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
    <script>window.print()</script>
</body>
</html>