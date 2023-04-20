<div class="modal fade" id="modaltambahpenarikan" tabindex="-1" aria-labelledby="modaltambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahLabel">Tambah Data Penarikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('transaksi/simpanpenarikan', ['class' => 'formsimpanpenarikan']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namanasabah">Nama Nasabah *</label>
                    <select name="id_nasabah" id="id_nasabah" class="form-control form-control-sm">
                        <option value="">-Pilih Nasabah</option>
                        <?php foreach ($nasabah as $key) : ?>
                            <option value="<?= $key['id_nasabah'] ?>,<?= $key['saldo'] ?>" data-user="<?= $key['saldo'] ?>"><?= $key['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback errorid_nasabah">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Saldo</label>
                    <input type="text" id="saldo" name="saldo" class="form-control form-control-sm" readonly /></br>
                </div>
                <div class="form-group">
                    <label for="nama">Jumlah Penarikan *</label>
                    <input type="text" name="jumlah_penarikan" id="jumlah_penarikan" class="form-control form-control-sm" /></br>
                    <div class="invalid-feedback errorjumlah_penarikan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Saldo Akan :</label>
                    <td><input type="text" id="saldosekarang" name="saldosekarang" class="form-control form-control-sm" readonly /></td>

                </div>
                <h8 style="color: green;">Ket : (*) Kolom harus diisi</h8>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolsimpanpenarikan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#id_nasabah').change(function() {
            $('#saldo').val($('#id_nasabah option:selected').attr('data-user'));
            const saldo = $('#id_nasabah option:selected').attr('data-user');
            document.getElementById("saldo").value = saldo;

        });

    });

    $(document).ready(function() {
        $("#jumlah_penarikan, #saldo").keyup(function() {
            var jumlah_penarikan = $("#jumlah_penarikan").val();
            var saldo = document.getElementById("saldo").value;

            var saldosekarang = parseInt(saldo) - parseInt(jumlah_penarikan);
            $("#saldosekarang").val(saldosekarang);
            var jumlah_penarikan = document.getElementById("jumlah_penarikan").value;
            document.getElementById("saldosekarang").value = saldosekarang;

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.formsimpanpenarikan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",

                beforeSend: function() {
                    $('.tombolsimpanpenarikan').prop('disabled', true);
                    $('.tombolsimpanpenarikan').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolsimpanpenarikan').prop('disabled', false);
                    $('.tombolsimpanpenarikan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.id_nasabah) {
                            $('#id_nasabah').addClass('is-invalid');
                            $('.errorid_nasabah').html(response.error.id_nasabah);
                        } else {
                            $('#id_nasabah').removeClass('is-invalid');
                            $('#id_nasabah').addClass('is-valid');
                            $('.errorid_nasabah').html('');
                        }
                        if (response.error.jumlah_penarikan) {
                            $('#jumlah_penarikan').addClass('is-invalid');
                            $('.errorjumlah_penarikan').html(response.error.jumlah_penarikan);
                        } else {
                            $('#jumlah_penarikan').removeClass('is-invalid');
                            $('#jumlah_penarikan').addClass('is-valid');
                            $('.errorjumlah_penarikan').html('');
                        }

                    } else {
                        $('#id_nasabah').removeClass('is-invalid').addClass('is-valid');
                        $('#jumlah_penarikan').removeClass('is-invalid').addClass('is-valid');
                        $('.tombolsimpanpenarikan').html('<i class="fa fa-spinner"></i> Cek');

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
                        $("#modaltambahpenarikan")
                            .modal("show")
                            .on("shown.bs.modal", function() {
                                window.setTimeout(function() {
                                    $("#modaltambahpenarikan").modal("hide");
                                    location.reload();
                                }, 1000);
                            });
                    }

                    $("#modaltambahpenarikan")
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