<html>
<head>
<title>Faktur Pembayaran</title>
<style>
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
<center>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
<span style='font-size:12pt'><b>SATAHI</b></span></br>
Batang Toru, Tapanuli Selatan
</td>
<td style='vertical-align:top' width='30%' align='left'>
<b><span style='font-size:12pt'>FAKTUR PENJUALAN</span></b></br>
Nama  : <?= $invoice->namanasabah; ?></br>
Tanggal :<?= date(('d-m-Y'),strtotime($invoice->tglbuat)); ?></br>
</td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>

</td>
<td style='vertical-align:top' width='30%' align='left'>
No Telp : <?= $invoice->no_hp; ?>
</td>
</table>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
 
<tr align='center'>

<td width='20%'>Nama Barang</td>
<td width='13%'>Harga</td>
<td width='4%'>Qty</td>

<td width='13%'>Total Harga</td>

<td><?= $invoice->namasampah; ?></td>
<td><?= $invoice->harga; ?></td>
<td><?= $invoice->satuan; ?></td>

<td style='text-align:right'><?= $invoice->total; ?></td>

<tr>
<td colspan = '5'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div></td>
<td style='text-align:right'><?= $invoice->total; ?></td>
</tr>
<tr>
<td colspan = '6'><div style='text-align:right'>Terbilang : </div></td>
</tr>
<tr>
<td colspan = '5'><div style='text-align:right'>Cash : </div></td>
<td style='text-align:right'>Rp</td>
</tr>
<tr>
<td colspan = '5'><div style='text-align:right'>Kembalian : </div></td><td style='text-align:right'>Rp</td>
</tr>


</table>
 
<table style='width:650; font-size:7pt;' cellspacing='2'>
<tr>
<td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
<td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
<td align='center'>TTD,</br></br><u>(...........)</u></td>
</tr>
</table>
</center>
</body>
</html>