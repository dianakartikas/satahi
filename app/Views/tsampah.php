<div class="modal fade" id="modaltambahsampah" tabindex="-1" aria-labelledby="modaltambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahLabel">Tambah Data Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('sampah/simpan', ['class' => 'formsimpansampah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="jenis_sampah">Jenis Sampah *</label>
                    <select type="text" name="jenis_sampah" id="jenis_sampah" class="form-control form-control-sm">
                        <option value="">-- Pilih Jenis Sampah --</option>
                        <option value="Organik">Organik</option>
                        <option value="Anorganik">Anorganik</option>
                        <option value="B3">B3</option>
                    </select>
                    <div class="invalid-feedback errorjenis_sampah">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_sampah">Nama Sampah *</label>
                    <input type="text" name="nama" id="nama" class="form-control form-control-sm">
                    <div class="invalid-feedback errornama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_sampah">Harga *</label>
                    <input type="text" name="harga" id="harga" class="form-control form-control-sm">
                    <div class="invalid-feedback errorharga">
                    </div>
                </div>
                <h8 style="color: green;">Ket : (*) Kolom harus diisi</h8>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolsimpansampah">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

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
                    $('.tombolsimpansampah').prop('disabled', true);
                    $('.tombolsimpansampah').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolsimpansampah').prop('disabled', false);
                    $('.tombolsimpansampah').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.jenis_sampah) {
                            $('#jenis_sampah').addClass('is-invalid');
                            $('.errorjenis_sampah').html(response.error.jenis_sampah);
                        } else {
                            $('#jenis_sampah').removeClass('is-invalid');
                            $('#jenis_sampah').addClass('is-valid');
                            $('.errorjenis_sampah').html('');
                        }
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
                    } else {
                        $('#jenis_sampah').removeClass('is-invalid').addClass('is-valid');
                        $('#nama').removeClass('is-invalid').addClass('is-valid');
                        $('#harga').removeClass('is-invalid').addClass('is-valid');
                        $('.tombolsimpansampah').html('<i class="fa fa-spinner"></i> Cek');

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
                        $("#modaltambahsampah")
                            .modal("show")
                            .on("shown.bs.modal", function() {
                                window.setTimeout(function() {
                                    $("#modaltambahsampah").modal("hide");
                                    location.reload();
                                }, 1000);
                            });
                    }

                    $("#modaltambahsampah")
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