<?= $this->extend('template'); ?>
<?= $this->section('content'); ?>

<div class="tile_count row">
    <div class="col  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Nasabah</span>
        <div class="count"><?= $nasabah; ?></div>
        <span class="count_bottom"><i class="green"> <?= $nonnasabah; ?></i> Belum Dikonfirmasi </span>
    </div>
    <div class="col  tile_stats_count">
        <span class="count_top"><i class="fa fa-trash"></i> Sampah</span>
        <div class="count"><?= $jumlahsampah; ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?= ($countjenis / $jumlahsampah) * 100; ?>% </i>Total Sampah </span>
    </div>
    <div class="col  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Transaksi</span>
        <div class="count green"><?= $countTransaksi; ?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?= ($persenTransaksi / $nasabah) * 100; ?>% </i>Transaksi</span>
    </div>
    <div class="col  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Debit</span>
        <?php
        foreach ($hitungDebit as $row) :
        ?>
            <div class="count"><i class="green"><?php echo number_format($row['total'], 0, ".", "."); ?></i></div>
        <?php endforeach; ?>
        <?php
        foreach ($hitungKredit as $row) :
        ?>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i><?php echo number_format($row['jumlah_keluar'], 0, ".", "."); ?></i> Total Kredit</span>
        <?php endforeach; ?>
    </div>

</div>

<!-- /top tiles -->

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Total Penjualan <small>Sampah</small></h3>
                </div>

            </div>

            <div class="col-md-9 col-sm-9 canvas-holder">
                <canvas id="myLineChart" width="150" height="300"></canvas>
            </div>
            <div class="col-md-3 col-sm-3  bg-white">
                <div class="x_title">
                    <h2>Transaksi</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12 col-sm-12 ">
                    <div>
                        <p>Jenis Sampah Terjual / Total Jenis Sampah</p>
                        <div class="">

                            <div class="progress progress_sm" style="width: 100%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?= ($countjenis / $jumlahsampah) * 100; ?>"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Nasabah yang melakukan Penjualan</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 100%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?= $total = ($persenTransaksi / $nasabah) * 100; ?>"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 ">
                    <div>
                        <p>Nasabah yang melakukan Penarikan Saldo</p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 100%;">
                                <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="<?= $total = ($hitungPenarikan / $nasabah) * 100; ?>"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>

</div>
<br />

<!-- /page content -->



<!-- jQuery -->
<script src="<?= base_url(); ?>/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url(); ?>/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?= base_url(); ?>/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?= base_url(); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url(); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url(); ?>/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?= base_url(); ?>/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?= base_url(); ?>/vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url(); ?>/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url(); ?>/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url(); ?>/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url(); ?>/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?= base_url(); ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url(); ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url(); ?>/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?= base_url(); ?>/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?= base_url(); ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url(); ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url(); ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"74c9e70048719f85","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.1","si":100}' crossorigin="anonymous"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url(); ?>/build/js/custom.min.js"></script>
<?php
if (isset($chart)) {
    foreach ($chart as $data2) {

        $storelabel[] =  date("m-Y", strtotime($data2['created_at']));
        $datatotal[] = $data2['totaljual'];
    }
} ?>
<?php if (isset($chart)) { ?>

    <script>
        var ctx = document.getElementById("myLineChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($storelabel); ?>,
                datasets: [{
                    label: "Grafik Penjualan",
                    data: <?php echo json_encode($datatotal); ?>,
                    backgroundColor: [

                        'rgba(54, 162, 253, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 255, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderColor: [

                        'rgba(54, 162, 253, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 255, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],

                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginZero: true
                        }
                    }]
                }
            }
        });
    </script>

<?php } ?>
</body>

</html>
<?= $this->endSection(); ?>