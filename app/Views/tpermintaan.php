<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url(); ?>/images/icon.ico" type="image/ico" />

    <title>SATAHI | Beranda</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?= base_url(); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url(); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url(); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?= base_url(); ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url(); ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url(); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url(); ?>/build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->

    <link href="<?= base_url(); ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/vendors/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendors/sweetalert2/sweetalert2.min.css">
</head>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">

        <nav class="nav navbar-nav">
            <ul class="navbar-right">

                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    SATAHI
                </a>


            </ul>

            <ul class="navbar-left">
                <a class="" href="/"><i class="fa fa-sign-out pull-right"></i> </a>
            </ul>
        </nav>
    </div>
</div>
<div class="col-md-12 col-sm-12 ">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
    <?php if (session()->has('errors')) : ?>
        <ul class="alert alert-danger">
            <?php foreach (session('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <!-- /top navigation -->

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                <!-- page content -->

                <div class="clearfix"></div>

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Permintaan <small>Nasabah</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form action="/nasabah/save" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <label for="">Nama Nasabah</label>
                                        <input type="text" name="nama" id="nama" class="form-control<?= ($validation->hasError('nama')) ? ' is-invalid' : '' ?>" value="<?= old('nama'); ?>" placeholder="Nama Nasabah">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Nomor Rekening</label>
                                        <input type="text" name="no_rekening" id="no_rekening" class="form-control<?= ($validation->hasError('no_rekening')) ? ' is-invalid' : '' ?>" value="<?= old('no_rekening'); ?>" placeholder="Nomor Rekening Nasabah">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_rekening'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor HP</label>
                                        <input type="text" id="no_hp" name="no_hp" class="form-control<?= ($validation->hasError('no_hp')) ? ' is-invalid' : '' ?>" value="<?= old('no_hp'); ?>" placeholder="Nomor HP Nasabah">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control<?= ($validation->hasError('alamat')) ? ' is-invalid' : '' ?>" value="<?= old('alamat'); ?>" placeholder="Alamat Nasabah">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_image">Foto</label>
                                        <input type="file" name="user_image" id="user_image" class="form-control-file<?= ($validation->hasError('user_image')) ? ' is-invalid' : '' ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('user_image'); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- jQuery -->
        <script src="<?= base_url(); ?>/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url(); ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url(); ?>/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?= base_url(); ?>/vendors/nprogress/nprogress.js"></script>
        <!-- iCheck -->
        <script src="<?= base_url(); ?>/vendors/iCheck/icheck.min.js"></script>
        <!-- Datatables -->
        <script src="<?= base_url(); ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="<?= base_url(); ?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/jszip/dist/jszip.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?= base_url(); ?>/vendors/pdfmake/build/vfs_fonts.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?= base_url(); ?>/vendors/sweetalert2/sweetalert2.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?= base_url(); ?>/build/js/custom.min.js"></script>
        $(function() {

        <?php if (session()->getFlashdata("success")) { ?>
            Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session("success") ?>'
            })
        <?php } ?>
        });

        $(function() {

        <?php if (session()->has("errors")) { ?>
            Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: '<?= session("error") ?>'
            })
        <?php } ?>
        });
        </script>
        <script>
            $(function() {

                <?php if (session()->getFlashdata("warning")) { ?>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Periksa Data!',
                        text: '<?= session("warning") ?>'
                    })
                <?php } ?>
            });
        </script>
        <script>
            $(function() {
                <?php if (session()->getFlashData('status')) { ?>
                    swall({
                        tittle: "<?= session()->getFlashData('status'); ?>",
                        text: "<?= session()->getFlashData('status_text'); ?>",
                        icon: "<?= session()->getFlashData('status_icon'); ?>",
                        button: "OK",

                    });
                <?php } ?>
            });
        </script>
    </body>




</html>