
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
<style>
    .container1 {
        position: relative;
        text-align: center;
        color: black;
    }

    .top-left {
        position: relative;
        top: -150px;
        left: -100px;
        bottom: auto;
    }

    .top-right {
        position: relative;
        top: -179px;
        right: 42px;
        bottom: auto;
    }

    .top-left2 {
        position: relative;
        top: -170px;
        left: -130px;

    }

    .top-right2 {
        position: relative;
        top: -179px;
        right: 50px;
        font-family: sans-serif;
        font-size: 8px;
    }

    .centered {
        position: absolute;
        top: 10%;
        left: 40%;
        transform: translate(-50%, -50%);
    }

    .barcode {
        position: relative;
        top: -200px;
        right: -73px;
    }

    .kartubelakang {
        position: relative;
        top: -160px;
        right: 1px;
    }
</style>

<div class="col-md-12 col-sm-12 ">
  
    <div class="x_panel">
        <div class="x_title">
            <h2>Detail Profile <small><?= $nasabah->nama; ?></small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-3 col-sm-3  profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" src="<?= base_url(); ?>/images/nasabah/<?= $nasabah->user_image; ?>" alt="Avatar" title="Change the avatar" width="100%" height="100%" object-fit="cover">
                    </div>
                </div>
                <h3><?= $nasabah->nama; ?></h3>

                <ul class=" list-unstyled user_data">
                    <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $nasabah->alamat; ?>
                    </li>

                    <li>
                        <i class="fa fa-phone user-profile-icon"></i> <?= $nasabah->no_hp; ?>
                    </li>
                </ul>
        
                <br />
            </div>
            <div class="col-md-9 col-sm-9 ">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data Pribadi</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Penjualan</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="penarikan-tab" data-toggle="tab" aria-expanded="false">Penarikan</a>
                        </li>
                      
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <table class="data table table-striped no-margin">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Rekening</th>
                                        <th>Nomor HP</th>
                                        <th>Alamat</th>
                                        <th>Saldo</th>
                                        <th>Terdaftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;

                                    ?>
                                    <tr>
                                        <td><?= $nomor++; ?></td>
                                        <td><?= $nasabah->nama; ?></td>
                                        <td><?= $nasabah->no_rekening; ?></td>
                                        <td><?= $nasabah->no_hp; ?></td>
                                        <td><?= $nasabah->alamat; ?></td>
                                        <td><?php echo "Rp. " . number_format($nasabah->saldo, 0, ".", "."); ?></td>
                                        <td>
                                            <h8><?= date('d-m-Y H:i', strtotime($nasabah->created_at)); ?>
                                            </h8>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Sampah</th>
                                        <th>Harga</th>
                                        <th>Berat</th>
                                        <th>Transaksi</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Tanggal Diubah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($transaksi as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $row['namanasabah']; ?></td>
                                            <td><?= $row['jenis_sampah']; ?></td>
                                            <td><?= $row['namasampah']; ?></td>
                                            <td><?php echo "Rp. " . number_format($row['harga'], 0, ".", "."); ?></td>
                                            <td><?= $row['satuan']; ?></td>
                                            <td>
                                                <h8 style="color: red;"><?php echo "Rp. " . number_format($row['saldot'], 0, ".", "."); ?>,
                                                    <h8 style="color: green;">+ <?php echo "Rp. " . number_format($row['total'], 0, ".", "."); ?>,
                                                        <h8 style="color: blue;  font-weight: bold;"><?php echo "Rp. " . number_format($row['saldos'], 0, ".", "."); ?>
                                            </td>
                                            <td>
                                                <h8><?= date('d-m-Y H:i', strtotime($row['tglbuat'])); ?>
                                                </h8>
                                            </td>
                                            <td>
                                                <h8> <?= date('d-m-Y H:i', strtotime($row['tglubah'])); ?></h8>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- end user projects -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="penarikan-tab">
                            <table class="data table table-striped no-margin">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Saldo Utama</th>
                                        <th>Penarikan</th>

                                        <th>Tanggal Dibuat</th>
                                        <th>Tanggal Diubah</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($penarikan as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td style="color: blue;"><?php echo "Rp. " . number_format($row['saldo'], 0, ".", "."); ?></td>
                                            <td>
                                                <h8 style="color: blue;">-<?php echo "Rp. " . number_format($row['saldot'], 0, ".", "."); ?>,

                                                    <h8 style="color: green;"> <?php echo "Rp. " . number_format($row['saldos'], 0, ".", "."); ?>
                                                        <h8 style="color: red;">-<?php echo "Rp. " . number_format($row['jumlah_keluar'], 0, ".", "."); ?>,

                                            </td>


                                            <td>
                                                <h8><?= date('d-m-Y H:i', strtotime($row['tglbuat'])); ?>
                                                </h8>
                                            </td>
                                            <td>
                                                <h8> <?= date('d-m-Y H:i', strtotime($row['tglubah'])); ?></h8>
                                            </td>



                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
<!-- morris.js -->
<script src="<?= base_url(); ?>/vendors/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>/vendors/morris.js/morris.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url(); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url(); ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


</body>

</html>
