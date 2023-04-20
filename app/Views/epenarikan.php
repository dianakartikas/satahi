<div class="modal fade" id="modaleditpenarikan" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditLabel">Edit Penarikan <strong><?= $nama; ?></strong> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('/transaksi/updatepenarikan', ['class' => 'formeditpenarikan']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" name="id_keluar" id="id_keluar" value="<?= $id_keluar; ?>">
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
                            <label for="nama">Nama Nasabah</label>
                            <input type="hidden" name="id_nasabah" id="id_nasabah" value="<?= $id_nasabah; ?>">
                            <input type="text" name="nama" id="nama" class="form-control form-control-sm" value="<?= $nama; ?>" readonly>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nama">*</label>
                            <input type="text" name="nama" id="nama" class="form-control form-control-sm" value="<?= $nama; ?>" readonly disabled="disabled">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="saldo">saldo</label>
                            <input type="text" name="saldo" id="saldo" value="<?= $saldo; ?>" class="form-control form-control-sm" readonly>
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
                            <label for="jumlah_penarikan">Jumlah Penarikan</label>
                            <input type="text" name="jumlah_penarikan" id="jumlah_penarikan" value="<?= $jumlah_keluar; ?>" class="form-control form-control-sm">
                            <div class="invalid-feedback errorjumlah_penarikan">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="inputDelivery">*</label>
                            <input type="text" class="form-control form-control-sm" name="jumlah_keluar1" id="jumlah_keluar1" value="<?= $jumlah_keluar; ?>" readonly>
                        </div>
                    </div>
                </div>

                <td style=" color: green;">* Saldo akan :<input type="text" id="saldosekarang1" name="saldosekarang1" class="form-control form-control-sm" readonly /></td>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success tombolpenarikan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>


<script>
    $(document).ready(function() {
        $("#jumlah_penarikan, #saldo, #jumlah_keluar1").keyup(function() {
            var jumlah_penarikan = $("#jumlah_penarikan").val();
            var jumlah_penarikan = document.getElementById("jumlah_penarikan").value;
            var saldo = document.getElementById("saldo").value;
            var jumlah_keluar1 = document.getElementById("jumlah_keluar1").value;

            var saldosekarang1 = ((parseInt(saldo) + parseInt(jumlah_keluar1)) - parseInt(jumlah_penarikan));
            $("#saldosekarang1").val(saldosekarang1);
            document.getElementById("saldosekarang1").value = saldosekarang1;



        });
    });


    $(document).ready(function() {
        $('.formeditpenarikan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolpenarikan').prop('disabled', true);
                    $('.tombolpenarikan').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function(e) {
                    $('.tombolpenarikan').prop('disabled', false);
                    $('.tombolpenarikan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.jumlah_penarikan) {
                            $('#jumlah_penarikan').addClass('is-invalid');
                            $('.errorjumlah_penarikan').html(response.error.jumlah_penarikan);
                        } else {
                            $('#jumlah_penarikan').removeClass('is-invalid');
                            $('#jumlah_penarikan').addClass('is-valid');
                            $('.errorjumlah_penarikan').html('');
                        }


                    } else {
                        $('#jumlah_penarikan').removeClass('is-invalid').addClass('is-valid');
                        $('.tombolpenarikan').html('<i class="fa fa-spinner"></i> Cek');

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