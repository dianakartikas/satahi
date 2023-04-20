<div class="modal fade" id="modaleditsampah" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditLabel">Edit Sampah <strong><?= $nama; ?></strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('/sampah/update', ['class' => 'formsimpansampah']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" name="id_sampah" id="id_sampah" value="<?= $id_sampah; ?>">
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
                            <label for="namasampah">Nama Sampah</label>
                            <input type="text" name="nama" id="nama" class="form-control form-control-sm" value="<?= $nama; ?>">
                            <div class="invalid-feedback errornama">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="namasampah">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $nama; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="namasampah">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control form-control-sm" value="<?php echo "Rp. " . number_format($harga, 0, ".", "."); ?>">
                            <div class="invalid-feedback errorharga">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="namasampah">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $harga; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="namasampah">Jenis Sampah</label>
                            <select name="jenis_sampah" id="jenis_sampah" class="form-control form-control-sm" value="<?= $jenis_sampah; ?>">
                                <option value="Organik" <?php if ($jenis_sampah == 'Organik') { ?> selected="selected" <?php } ?>>Organik</option>
                                <option value="Anorganik" <?php if ($jenis_sampah == 'Anorganik') { ?> selected="selected" <?php } ?>>Anorganik</option>
                                <option value="B3" <?php if ($jenis_sampah == 'B3') { ?> selected="selected" <?php } ?>>B3</option>
                            </select>
                            <div class="invalid-feedback errorjenis_sampah">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="namasampah">*</label>
                            <input type="text" class="form-control form-control-sm" value="<?= $jenis_sampah; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolsampah">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<script>
    var harga = document.getElementById('harga');
    harga.addEventListener('keyup', function(e) {
        harga.value = formatRupiah(this.value, 'Rp. ');
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
        $('.formsimpansampah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolsampah').prop('disabled', true);
                    $('.tombolsampah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolsampah').prop('disabled', false);
                    $('.tombolsampah').html('Simpan');
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
                        if (response.error.harga) {
                            $('#harga').addClass('is-invalid');
                            $('.errorharga').html(response.error.harga);
                        } else {
                            $('#harga').removeClass('is-invalid');
                            $('#harga').addClass('is-valid');
                            $('.errorharga').html('');
                        }
                        if (response.error.jenis_sampah) {
                            $('#jenis_sampah').addClass('is-invalid');
                            $('.errorjenis_sampah').html(response.error.jenis_sampah);
                        } else {
                            $('#jenis_sampah').removeClass('is-invalid');
                            $('#jenis_sampah').addClass('is-valid');
                            $('.errorjenis_sampah').html('');
                        }
                    } else {
                        $('#nama').removeClass('is-invalid').addClass('is-valid');
                        $('#harga').removeClass('is-invalid').addClass('is-valid');
                        $('#jenis_sampah').removeClass('is-invalid').addClass('is-valid');
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