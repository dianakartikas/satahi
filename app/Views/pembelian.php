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
                        <p class="text-muted font-13 m-b-30">
                            Tabel berisikan data-data transaksi <strong>hati-hati</strong> dalam pengeditan dan penghapusan dapat mempengaruhi saldo user</strong>. Edit dan hapus <strong>klik tanda +</strong> di kolom pertama.
                        </p>
                        <button type="button" class="btn btn-round btn-success btn-sm tomboltambahpembelian">
                            <i class="fa fa-plus-circle"></i> Tambah Data
                        </button>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                                    <th>Aksi</th>
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

                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" onclick="edit('<?= $row['id_transaksi'] ?>')">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['id_transaksi'] ?>','<?= $row['namanasabah'] ?>')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                            <a href="<?= base_url('pembelian/' . $row['id_transaksi']); ?>" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-file"></i> Invoice
                                            </a>
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
<div class="viewmodalpembelian" style="display: none;"></div>
<!--tambah script-->
<script>
    $(document).ready(function() {
        $('.tomboltambahpembelian').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('transaksi/tambahpembelian') ?>",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.viewmodalpembelian').html(response.data).show();
                        $('#modaltambahpembelian').on('shown.bs.modal', function(e) {
                            $('#namanasabah').focus();

                        });
                        $('#modaltambahpembelian').modal('show');
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
    function hapus(id_transaksi, namanasabah) {
        Swal.fire({
            title: 'Hapus Transaksi',
            html: `Yakin hapus nama transaksi dengan nasabah <strong>${namanasabah}</strong> ini ?`,
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
                    url: "<?= site_url('transaksi/hapuspembelian') ?>",
                    data: {
                        id_transaksi: id_transaksi
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
            url: "<?= site_url('transaksi/editpembelian') ?>",
            data: {
                id_transaksi: id
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('.viewmodalpembelian').html(response.data).show();
                    $('#modaleditpembelian').on('shown.bs.modal').on('shown.bs.modal', function(event) {
                        $('').focus();
                    });
                    $('#modaleditpembelian').modal('show');
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