<div class="modal fade" id="modaleditnasabah" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditLabel">Edit Nasabah <strong><?= $nama; ?></strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('/nasabah/update', ['class' => 'formsimpannasabah']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" name="id_nasabah" id="id_nasabah" value="<?= $id_nasabah; ?>">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            Data Edit
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-warning alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            Data Sekarang
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="namanasabah">Nama Nasabah</label>
                            <input type="text" name="nama" id="nama" class="form-control form-control-sm" value="<?= $nama; ?>">
                            <div class="invalid-feedback errornama">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="namanasabah">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $nama; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="no_rekening">No Rekening</label>
                            <input type="text" name="no_rekening" id="no_rekening" class="form-control form-control-sm" value="<?= $no_rekening; ?>">
                            <div class="invalid-feedback errorno_rekening">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="no_rekening">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $no_rekening; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="saldo">Saldo</label>
                            <input type="text" name="saldo" id="saldo" class="form-control form-control-sm" value="<?php echo "Rp. " . number_format($saldo, 0, ".", "."); ?>">
                            <div class=" invalid-feedback errorsaldo">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="saldo">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo "Rp. " . number_format($saldo, 0, ".", "."); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="saldo">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control form-control-sm" value="<?= $alamat; ?>">
                            <div class="invalid-feedback erroralamat">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="alamat">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $alamat; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control form-control-sm" value="<?= $no_hp; ?>">
                            <div class="invalid-feedback errorno_hp">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="no_hp">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $no_hp; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolnasabah">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<script>
    var saldo = document.getElementById('saldo');
    saldo.addEventListener('keyup', function(e) {
        saldo.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script>
    $(document).ready(function() {
        $('.formsimpannasabah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolnasabah').prop('disabled', true);
                    $('.tombolnasabah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolnasabah').prop('disabled', false);
                    $('.tombolnasabah').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errornama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('#nama').addClass('is-valid');
                            $('.errornama').html('');
                        }
                        if (response.error.no_rekening) {
                            $('#no_rekening').addClass('is-invalid');
                            $('.errorno_rekening').html(response.error.no_rekening);
                        } else {
                            $('#no_rekening').removeClass('is-invalid');
                            $('#no_rekening').addClass('is-valid');
                            $('.errorno_rekening').html('');
                        }
                        if (response.error.saldo) {
                            $('#saldo').addClass('is-invalid');
                            $('.errorsaldo').html(response.error.saldo);
                        } else {
                            $('#saldo').removeClass('is-invalid');
                            $('#saldo').addClass('is-valid');
                            $('.errorsaldo').html('');
                        }
                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.erroralamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('#alamat').addClass('is-valid');
                            $('.erroralamat').html('');
                        }
                        if (response.error.no_hp) {
                            $('#no_hp').addClass('is-invalid');
                            $('.errorno_hp').html(response.error.no_hp);
                        } else {
                            $('#no_hp').removeClass('is-invalid');
                            $('#no_hp').addClass('is-valid');
                            $('.errorno_hp').html('');
                        }
                    } else {
                        $('#nama').removeClass('is-invalid').addClass('is-valid');
                        $('#no_rekening').removeClass('is-invalid').addClass('is-valid');
                        $('#saldo').removeClass('is-invalid').addClass('is-valid');
                        $('#alamat').removeClass('is-invalid').addClass('is-valid');
                        $('#no_hp').removeClass('is-invalid').addClass('is-valid');
                        Swal.fire({
                                toast: true,
                                class: 'bg-info',
                                position: 'top-right',
                                showConfirmButton: false,
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.success,
                                timer: 1000
                            })
                            .then(function() {
                                window.location.reload();
                            })
                    }

                },
                error: function(xhr, ajaxOptios, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
            return false;
        });
    });
</script>