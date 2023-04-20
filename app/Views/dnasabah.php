<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

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
                <button class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#formModalEdit<?= $nasabah->id_nasabah; ?>">
                    <i class="fa fa-pencil"></i> Edit Profile
                </button>
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
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="kartuvirtual-tab" data-toggle="tab" aria-expanded="false">Kartu Virtual</a>
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
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="kartuvirtual-tab">
                            <div class="container1">
                                <img src="<?= base_url(); ?>/images/kartu/depan.png" alt="Snow" class="img-thumbnail" width="323px" height="204px">
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="top-right"><strong><?= $nasabah->nama; ?></strong></div>
                                <div class="top-right2"><?= $nasabah->no_hp; ?> </div>
                                <div class="top-right2">dibuat pada <?= date('d-m-Y', strtotime($nasabah->created_at)); ?></div>
                                <div class="barcode"><img src=<?= 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://batangtoru.tapselkab.go.id/nasabah/' . $nasabah->kode; ?> title="Link to Google.com" width="50px" height="50px" /></div>
                                <div class="kartubelakang"><img src="<?= base_url(); ?>/images/kartu/belakang.png" class="img-thumbnail" width="323px" height="204px">
                                    <br><br><a href="<?= base_url('nasabah/print/' . $nasabah->id_nasabah); ?>" type="button" class="btn btn-primary btn-sm">
                                        <i class="fa fa-print"></i> Download Kartu</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formModalEdit<?= $nasabah->id_nasabah; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data <?= $nasabah->nama; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/nasabah/updateper/<?= $nasabah->id_nasabah; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <br>
                        <div class="row g-0">
                            <input type="hidden" name="gambarLama" value="<?= $nasabah->user_image; ?>">

                            <div class="col-md-4">
                                <img src="<?= base_url('/images/nasabah/' . $nasabah->user_image); ?>" class="card-img" alt="<?= $nasabah->nama; ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control<?= ($validation->hasError('nama')) ? ' is-invalid' : '' ?>" value="<?= (old('nama')) ? old('nama') : $nasabah->nama; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_rekening">Nomor Rekening</label>
                                        <input type="text" name="no_rekening" id="no_rekening" class="form-control<?= ($validation->hasError('no_rekening')) ? ' is-invalid' : '' ?>" value="<?= (old('no_rekening')) ? old('no_rekening') : $nasabah->no_rekening; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_rekening'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" name="no_hp" id="no_hp" class="form-control<?= ($validation->hasError('no_hp')) ? ' is-invalid' : '' ?>" value="<?= (old('no_hp')) ? old('no_hp') : $nasabah->no_hp; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control<?= ($validation->hasError('alamat')) ? ' is-invalid' : '' ?>" value="<?= (old('alamat')) ? old('alamat') : $nasabah->alamat; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_image" class="col-sm-2 col-form-label">Foto</label>
                                        <div class="col-sm-2">
                                            <img src="/images/nasabah/<?= $nasabah->user_image; ?>" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input <?= ($validation->hasError('user_image')) ? 'is-invalid' : ''; ?>" id="user_image" name="user_image" onchange="previewImg()">
                                                <div class=" invalid-feedback">
                                                    <?= $validation->getError('user_image'); ?>
                                                </div>
                                                <label class="custom-file-label" for="user_image"><?= $nasabah->user_image; ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br> <br>
                                    <br>
                                    <div></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

<script>
    function previewImg() {

        const gambar = document.querySelector('#user_image');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;
        const filegambar = new FileReader();
        filegambar.readAsDataURL(gambar.files[0]);

        filegambar.onload = function(e) {

            imgPreview.src = e.target.result;

        }
    }
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
<?= $this->endSection(); ?>