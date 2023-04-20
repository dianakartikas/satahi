<div class="modal fade" id="modaleditpembelian" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditLabel">Edit Pembelian <strong><?= $namanasabah; ?></strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('/transaksi/updatepembelian', ['class' => 'formeditpembelian']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $id_transaksi; ?>">
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
                            <input type="hidden" name="id_nasabah" id="id_nasabah" value="<?= $id_nasabah; ?>">
                            <input type="text" name="namanasabah" id="namanasabah" class="form-control form-control-sm" readonly value="<?= $namanasabah; ?>">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="namanasabah">*</label>
                            <input type="text" name="namanasabah" id="namasampah" class="form-control form-control-sm" value="<?= $namanasabah; ?>" readonly>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="saldo">saldo</label>
                            <input type="text" name="saldo" id="saldo" value="<?= $saldo; ?>" class="form-control form-control-sm" disabled="disabled">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="inputDelivery">*</label>
                            <input type="text" class="form-control form-control-sm" name="saldo" id="saldo" value="<?= $saldo; ?>" readonly disabled="disabled">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="namasampah">Nama Sampah</label>
                            <select name="id_sampah" id="id_sampah" class="form-control form-control-sm">
                                <option value="">-Pilih Sampah</option>
                                <?php foreach ($sampah as $key) : ?>
                                    <option value="<?= $key['id_sampah'] ?>" data-price="<?= $key['harga'] ?>"><?= $key['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorid_sampah">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="namasampah">*</label>
                            <input type="text" name="namasampah" id="namasampah" class="form-control form-control-sm" value="<?= $namasampah; ?>" readonly>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="satuan">Berat</label>
                            <input type="number" name="satuan" id="satuan" value="<?= $satuan; ?>" class="form-control form-control-sm" oninput="myFunction()">
                            <div class="invalid-feedback errorsatuan">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="inputDelivery">*</label>
                            <input type="number" class="form-control form-control-sm" name="satuan" id="satuan" value="<?= $satuan; ?>" readonly disabled="disabled">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" id="harga" value="<?= $harga; ?>" class="form-control form-control-sm" disabled="disabled">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="inputDelivery">*</label>
                            <input type="text" class="form-control form-control-sm" name="harga" id="harga" value="<?= $harga; ?>" readonly>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="total">Total 1 :</label>
                            <input type="text" name="total" id="total" value="<?= $total; ?>" class="form-control form-control-sm" readonly>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Total 2 :</label>
                            <td> <input type="text" name="total2" id="total2" class="form-control form-control-sm" value="<?= $total; ?>" readonly disabled="disabled"></td>
                        </div>
                    </div>
                </div>
                <td style="color: green;">* Saldo akan :<input type="text" id="saldosekarang1" name="saldosekarang1" class="form-control form-control-sm" oninput="myFunction()" readonly /></td>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolpembelian">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>


<script>
    $(function() {
        $('#id_sampah').change(function() {
            $('#harga').val($('#id_sampah option:selected').attr('data-price'));
        });
    });

    function myFunction() {

        harga = document.getElementById("harga").value;
        satuan = document.getElementById("satuan").value;

        total = harga * satuan;
        total2 = document.getElementById("total2").value;
        saldo = document.getElementById("saldo").value;
        const saldosekarang = ((saldo - total2) + total);
        document.getElementById("saldosekarang1").value = parseInt(saldosekarang);
        document.getElementById("total").value = total;

    }
    $(document).ready(function() {
        $('.formeditpembelian').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolpembelian').prop('disabled', true);
                    $('.tombolpembelian').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolpembelian').prop('disabled', false);
                    $('.tombolpembelian').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
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
                        $('#id_sampah').removeClass('is-invalid').addClass('is-valid');
                        $('#satuan').removeClass('is-invalid').addClass('is-valid');

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