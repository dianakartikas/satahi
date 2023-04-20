<div class="modal fade" id="modaltambahnasabah" tabindex="-1" aria-labelledby="modaltambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahLabel">Tambah Data nasabah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('nasabah/simpan', ['class' => 'formsimpannasabah']) ?>
            <?= csrf_field(); ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Kode</label>
                    <input type="text" name="kode" id="kode" class="form-control form-control-sm" value="<?php echo random_string('alnum', 30); ?>" readonly>
                    <div class="invalid-feedback errorkode">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Nasabah *</label>
                    <input type="text" name="nama" id="nama" class="form-control form-control-sm">
                    <div class="invalid-feedback errornama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_rekening">Nomor Rekening *</label>
                    <input type="text" name="no_rekening" id="no_rekening" class="form-control form-control-sm">
                    <div class="invalid-feedback errorno_rekening">
                    </div>
                </div>

                <div class="form-group">
                    <label for="saldo">Saldo </label>
                    <input type="text" name="saldo" id="saldo" class="form-control form-control-sm">
                    <h8 style="color:green">-diperbolehkan kosong</h8>
                    <div class="invalid-feedback errorsaldo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP *</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control form-control-sm">
                    <div class="invalid-feedback errorno_hp">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat *</label>
                    <textarea type="text" name="alamat" id="alamat" class="form-control form-control-sm"></textarea>
                    <div class="invalid-feedback erroralamat">
                    </div>
                </div>
                <h8 style="color: green;">Ket : (*) Kolom harus diisi</h8>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolsimpannasabah">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

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
                    $('.tombolsimpannasabah').prop('disabled', true);
                    $('.tombolsimpannasabah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolsimpannasabah').prop('disabled', false);
                    $('.tombolsimpannasabah').html('Simpan');
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
                        if (response.error.kode) {
                            $('#kode').addClass('is-invalid');
                            $('.errorkode').html(response.error.kode);
                        } else {
                            $('#kode').removeClass('is-invalid');
                            $('#kode').addClass('is-valid');
                            $('.errorkode').html('');
                        }
                        if (response.error.saldo) {
                            $('#saldo').addClass('is-invalid');
                            $('.errorsaldo').html(response.error.saldo);
                        } else {
                            $('#saldo').removeClass('is-invalid');
                            $('#saldo').addClass('is-valid');
                            $('.errorsaldo').html('');
                        }
                        if (response.error.no_hp) {
                            $('#no_hp').addClass('is-invalid');
                            $('.errorno_hp').html(response.error.no_hp);
                        } else {
                            $('#no_hp').removeClass('is-invalid');
                            $('#no_hp').addClass('is-valid');
                            $('.errorno_hp').html('');
                        }
                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.erroralamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('#alamat').addClass('is-valid');
                            $('.erroralamat').html('');
                        }
                    } else {
                        $('#nama').removeClass('is-invalid').addClass('is-valid');
                        $('#no_rekening').removeClass('is-invalid').addClass('is-valid');
                        $('#saldo').removeClass('is-invalid').addClass('is-valid');
                        $('#no_hp').removeClass('is-invalid').addClass('is-valid');
                        $('#alamat').removeClass('is-invalid').addClass('is-valid');
                        $('.tombolsimpannasabah').html('<i class="fa fa-spinner"></i> Cek');

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
                        $("#modaltambahnasabah")
                            .modal("show")
                            .on("shown.bs.modal", function() {
                                window.setTimeout(function() {
                                    $("#modaltambahnasabah").modal("hide");
                                    location.reload();
                                }, 1000);
                            });
                    }

                    $("#modaltambahnasabah")
                        .modal("show")
                        .on("hide.bs.modal", function() {
                            location.reload();
                        });
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