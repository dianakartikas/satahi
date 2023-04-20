<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Master<small>Sampah</small></h2>
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


                        <button type="button" class="btn btn-round btn-success btn-sm tomboltambahsampah">
                            <i class="fa fa-plus-circle"></i> Tambah Data
                        </button>

                        <table id="datatable-responsive" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Edit</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                foreach ($sampah as $row) :
                                ?>
                                    <tr>
                                        <td><?= $nomor++; ?></td>
                                        <td><?= $row['jenis_sampah']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td>1 KG</td>
                                        <td><?php echo "Rp. " . number_format($row['harga'], 0, ".", "."); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" onclick="edit('<?= $row['id_sampah'] ?>')">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['id_sampah'] ?>','<?= $row['nama'] ?>')">
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
<div class="viewmodalsampah" style="display: none;"></div>
<!--tambah script-->
<script>
    $(document).ready(function() {
        $('.tomboltambahsampah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('sampah/tambah') ?>",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.viewmodalsampah').html(response.data).show();
                        $('#modaltambahsampah').on('shown.bs.modal', function(e) {
                            $('#nama').focus();

                        });
                        $('#modaltambahsampah').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });

    });
</script>

<script>
    function hapus(id_sampah, nama) {
        Swal.fire({
            title: 'Hapus Sampah',
            html: `Yakin hapus nama sampah <strong>${nama}</strong> ini ?`,
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
                    url: "<?= site_url('sampah/hapus') ?>",
                    data: {
                        id_sampah: id_sampah
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
    // js edit nasabah
    function edit(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('sampah/edit') ?>",
            data: {
                id_sampah: id
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('.viewmodalsampah').html(response.data).show();
                    $('#modaleditsampah').on('shown.bs.modal').on('shown.bs.modal', function(event) {
                        $('#nama').focus();
                    });
                    $('#modaleditsampah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    }
</script>
<?= $this->endSection(); ?>