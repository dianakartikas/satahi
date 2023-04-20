<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<?php if (session()->has('errors')) : ?>
    <ul class="alert alert-danger">
        <?php foreach (session('errors') as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?></p>
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Master<small>Permintaan Nasabah</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered table-hover dt-responsive nowrap" style="width:100%" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Rekening</th>
                                    <th>Saldo Awal</th>
                                    <th>Alamat</th>
                                    <th>Nomor HP</th>

                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                foreach ($nasabah as $row) :
                                ?>
                                    <tr>
                                        <td><?= $nomor++; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['no_rekening']; ?></td>
                                        <?php if (empty($row['saldo'])) { ?>
                                            <td>Rp. 0</td>
                                        <?php } else { ?>
                                            <td><?php echo "Rp. " . number_format($row['saldo'], 0, ".", "."); ?></td>

                                        <?php } ?>
                                        <td><?= $row['alamat']; ?></td>
                                        <td><?= $row['no_hp']; ?></td>

                                        <td>
                                            <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm<?= $row['id_nasabah']; ?>">
                                                <i class="fa fa-check"></i> Aktif
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['id_nasabah'] ?>','<?= $row['nama'] ?>')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>

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
<?php foreach ($nasabah as $row) : ?>
    <div class="modal fade bs-example-modal-sm<?= $row['id_nasabah']; ?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel2">Aktifkan <?= $row['nama']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/nasabah/updateaktif/<?= $row['id_nasabah']; ?>" method="post" enctype="multipart/form-data">

                        <?= csrf_field(); ?>

                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="kode" id="kode" class="form-control form-control-sm<?= ($validation->hasError('kode')) ? ' is-invalid' : '' ?>" value="<?php echo random_string('alnum', 25); ?>" readonly>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    Ada Yakin untuk mengaktifkan akun ini?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Aktifkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- /page content -->
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

</body>

</html>
<script>
    function hapus(id_nasabah, nama) {
        Swal.fire({
            title: 'Hapus Sampah',
            html: `Yakin hapus nama nasabah <strong>${nama}</strong> ini ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus !',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('nasabah/hapus') ?>",
                    data: {
                        id_nasabah: id_nasabah
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                toast: true,
                                class: 'bg-info',
                                position: 'top-right',
                                showConfirmButton: false,
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.success,
                                timer: 1000

                            }).then(location.reload(true))
                        }
                    },
                    error: function(xhr, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        })
    }
</script>
<script>
    $(function() {

        <?php if (session()->getFlashdata("success")) { ?>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session("success") ?>'
            })
        <?php } ?>
    });

    $(function() {

        <?php if (session()->has("errors")) { ?>
            Swal.fire({
                toast: true,
                position: 'top-right',
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
                toast: true,
                position: 'top-right',
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
<?= $this->endSection(); ?>