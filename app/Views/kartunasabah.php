<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .container {
      position: relative;
      text-align: center;
      color: black;
    }

    .bottom-left {
      position: absolute;
      bottom: 8px;
      left: 16px;
    }

    .top-left {
      position: absolute;
      top: 8px;
      left: 100px;
    }

    .top-right {
      position: absolute;
      top: 8px;
      right: 16px;
    }

    .centered2 {
      position: absolute;
      top: 27%;
      left: 49%;
      right: 30%;
      transform: translate(-50%, -50%);
      font-family: sans-serif;
      font-size: 10px;
    }

    .centered {
      position: absolute;
      top: 27%;
      left: 48%;
      right: 15%;
      transform: translate(-50%, -50%);
      font-family: sans-serif;
      font-size: 10px;
    }

    .centered3 {
      position: absolute;
      top: 27%;
      left: 49%;
      right: 30%;
      transform: translate(-50%, -50%);
      font-family: sans-serif;
      font-size: 8px;
    }

    .centered1 {
      position: absolute;
      top: 27%;
      left: 48%;
      right: 15%;
      transform: translate(-50%, -50%);
      font-family: sans-serif;
      font-size: 8px;
    }

    .barcode {
      position: absolute;
      top: 30.5%;
      left: 48%;
      right: 20%;

      transform: translate(-10%, -10%);
    }
  </style>
</head>

<body>

  <div class="container">
    <img src="<?php echo FCPATH . '/images/kartu/belakang.png' ?>" class="img-thumbnail" width="323px" height="204px">
    <br>
    <img src="<?php echo FCPATH . '/images/kartu/depan.png' ?>" class="img-thumbnail" width="323px" height="204px">


    <div class="row">
      <div class="col">
        <div class="centered" style='text-align:left;'>Nama</div>
      </div>
      <div class="col">
        <div class="centered2" style='text-align:left;'> :<?= $kode->nama; ?></div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="centered" style='text-align:left;'><br><br>No. Rek.</div>
      </div>
      <div class="col">
        <div class="centered2" style='text-align:left;'><br><br> :<?= $kode->no_rekening; ?></div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="centered" style='text-align:left;'><br><br><br><br>No Hp</div>
      </div>
      <div class="col">
        <div class="centered2" style='text-align:left;'><br><br><br><br> :<?= $kode->no_hp; ?></div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="centered" style='text-align:left;'><br><br><br><br><br><br>Dibuat Pada</div>
      </div>
      <div class="col">
        <div class="centered2" style='text-align:left;'><br><br><br><br><br><br> :<?= date('d-m-Y', strtotime($kode->created_at)); ?></div>
      </div>
    </div>

    <div class="centered1" style='text-align:left;'><br><br><br><br><br><br><br><br><br><br><br><br><br><br><strong>Created By Kecamatan Batang Toru</strong></div>

    <?php
    $something = $kode->kode;  ?><img src="" class="img-fluid" alt="Responsive image">

    <div class="barcode"><img src=<?= 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://satahi.kecamatanbator.com/nasabah/saldo/' . $something; ?> title="Link to Google.com" width="50px" height="50px" />
    </div>
  </div>

</body>

</html>