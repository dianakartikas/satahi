<div class="modal fade" id="modaltambahpembelian" tabindex="-1" aria-labelledby="modaltambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahLabel">Tambah Data Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('transaksi/simpanpembelian', ['class' => 'formsimpanpembelian']) ?>
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
                    <input type="text" id="saldot" name="saldot" class="form-control form-control-sm" readonly /></br>
                </div>
                <div class="form-group">
                    <label for="namasampah">Nama Sampah *</label>
                    <select name="id_sampah" id="id_sampah" class="form-control form-control-sm">
                        <option value="">-Pilih Sampah</option>
                        <?php foreach ($sampah as $key) : ?>
                            <option value="<?= $key['id_sampah'] ?>" data-price="<?= $key['harga'] ?>"><?= $key['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback errorid_sampah">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Harga</label>
                    <input type="text" name="harga" value="" id="harga" class="form-control form-control-sm" disabled="disabled" /></br>
                </div>

                <div class="form-group">
                    <label for="inputDelivery">Berat *</label>
                    <input type="number" class="form-control form-control-sm" name="satuan" id="satuan" oninput="myFunction()">
                    <div class="invalid-feedback errorsatuan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Total :</label>
                    <td><input id="total" type="text" name="total" class="form-control form-control-sm" readonly /></td>

                </div>

                <td><input id="saldosekarang" type="number" name="saldosekarang" class="form-control form-control-sm" hidden /></td>
                <h8 style="color: green;">Ket : (*) Kolom harus diisi</h8>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolsimpantransaksi">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#id_sampah').change(function() {
            $('#harga').val($('#id_sampah option:selected').attr('data-price'));
        });
    });
    $(function() {
        $('#id_nasabah').change(function() {
            $('#saldot').val($('#id_nasabah option:selected').attr('data-user'));
            const saldot = $('#id_nasabah option:selected').attr('data-user');
            document.getElementById("saldot").value = saldot;

        });

    });



    function myFunction() {

        var harga = document.getElementById("harga").value;
        var satuan = document.getElementById("satuan").value;

        var total = harga * satuan;
        var saldot = document.getElementById("saldot").value;

        document.getElementById("total").value = total;
        var saldosekarang = parseInt(saldot) + total;
        document.getElementById("saldosekarang").value = saldosekarang;

    }
</script>

<script>
    $(document).ready(function() {
        $('.formsimpanpembelian').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",

                beforeSend: function() {
                    $('.tombolsimpantransaksi').prop('disabled', true);
                    $('.tombolsimpantransaksi').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolsimpantransaksi').prop('disabled', false);
                    $('.tombolsimpantransaksi').html('Simpan');
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
                        if (response.error.id_sampah) {
                            $('#id_sampah').addClass('is-invalid');
                            $('.errorid_sampah').html(response.error.id_sampah);
                        } else {
                            $('#id_sampah').removeClass('is-invalid');
                            $('#id_sampah').addClass('is-valid');
                            $('.errorid_sampah').html('');
                        }
                        if (response.error.satuan) {
                            $('#satuan').addClass('is-invalid');
                            $('.errorsatuan').html(response.error.satuan);
                        } else {
                            $('#satuan').removeClass('is-invalid');
                            $('#satuan').addClass('is-valid');
                            $('.errorsatuan').html('');
                        }
                    } else {
                        $('#id_nasabah').removeClass('is-invalid').addClass('is-valid');
                        $('#id_sampah').removeClass('is-invalid').addClass('is-valid');
                        $('#satuan').removeClass('is-invalid').addClass('is-valid');
                        $('.tombolsimpantransaksi').html('<i class="fa fa-spinner"></i> Cek');

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
                        $("#modaltambahpembelian")
                            .modal("show")
                            .on("shown.bs.modal", function() {
                                window.setTimeout(function() {
                                    $("#modaltambahpembelian").modal("hide");
                                    location.reload();
                                }, 1000);
                            });
                    }

                    $("#modaltambahpembelian")
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