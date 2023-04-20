<html>

<head>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #000000;
			text-align: center;
			height: 20px;
			margin: 8px;
		}
	</style>
</head>

<body>
	<div style="font-size:15px; color:'#dddddd'"><i>Invoice Penarikan</i></div>
	<p>
		<i>----------------------------SATAHI-------------------------------</i><br>
		Kecamatan Batangtoru, Kabupaten Tapanuli Selatan
	</p>
	<hr>
	<p style="font-size:10px">
		Nasabah: <?= $invoice->nama; ?><br>
		Alamat : <?= $invoice->alamat; ?><br>
		Tanggal : <?= date('d-m-Y', strtotime($invoice->tglbuat)) ?><br>
	</p>
	<table style="font-size:9px">
		<tr>

			<th><strong>Saldo Awal</strong></th>
			<th><strong>Penarikan</strong></th>
			<th><strong>Saldo Sekarang</strong></th>

		</tr>
		<tr>
			<td><?= "Rp " . number_format($invoice->saldot, 2, ',', '.')  ?></td>
			<td><?= "Rp -" . number_format($invoice->jumlah_keluar, 2, ',', '.')  ?></td>
			<td><?= "Rp " . number_format($invoice->saldos, 2, ',', '.')  ?></td>
		</tr>
	</table>
	<div style="text-align: right">

		<p style="font-size:10px" ;>BatangToru, <?= date("d-m-y"); ?><br>Nasabah,

			<br><br><br><u><?= $invoice->nama; ?></u>
		</p>

	</div>


</body>

</html>