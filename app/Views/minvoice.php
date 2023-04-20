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
	<div style="font-size:15px; color:'#dddddd'"><i>Invoice Penjualan</i></div>
	<p>
		<i>SATAHI</i><br>
		Kecamatan Batangtoru, Kabupaten Tapanuli Selatan
	</p>
	<hr>
	<p style="font-size:10px">
		Nasabah: <?= $invoice->namanasabah; ?><br>
		Alamat : <?= $invoice->alamat; ?><br>
		Tanggal : <?= date('d-m-Y', strtotime($invoice->tglbuat)) ?><br>
	</p>
	<table style="font-size:9px">
		<tr>
			<th><strong>Barang</strong></th>
			<th><strong>Satuan</strong></th>
			<th><strong>Harga Satuan</strong></th>
			<th><strong>Total Harga</strong></th>

		</tr>
		<tr>
			<td><?= $invoice->namasampah ?></td>
			<td><?= $invoice->satuan ?></td>
			<td><?= "Rp " . number_format($invoice->harga, 2, ',', '.')  ?></td>
			<td><?= "Rp " . number_format($invoice->total, 2, ',', '.')  ?></td>
		</tr>
	</table>
	<div style="text-align: right">

		<p>BatangToru, <?= date("d-m-y"); ?>
			<br><br><br>
			Petugas
		</p>

	</div>


</body>

</html>