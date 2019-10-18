<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #f5f5f5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #f5f5f5;
			font-weight: bold;
		}
		h1 {
			text-align: left;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
</head>
<body onload="print()">
	<?php $id_pelanggan = $this->session->userdata('id_pelanggan') ?>
	<div class="cetak">
		<h1>Data Penjualan Toko <?php echo $this->session->userdata('nama_pelanggan'); ?></h1>
	
		<table class="table table-bordered table-responsive">
	 	<thead>
	 		<tr>
	 			<th width="20%">Nama Penerima</th>
	 			<th>: <?php echo $header_transaksi->nama_penerima ?></th>
	 		</tr>

	 		<tr>
	 			<th width="20%">No Telepon</th>
	 			<th>: <?php echo $header_transaksi->telepon ?></th>
	 		</tr>
	 		<tr>
	 			<th width="20%">Alamat Pengimiriman</th>
	 			<th>: <?php echo $header_transaksi->alamat ?></th>
	 		</tr>
	 		 <hr>
	 	</thead>
	 	 <br>
	 	<tbody>
	 		<tr>
	 			<td>Nama Pengirim</td>
	 			<td><?php echo $this->session->userdata('nama_pelanggan'); ?></td>
	 		
	 		</tr>
	 		<tr>
	 			<td>Alamat Pengirim</td>
	 			<td>: <?php echo $pelanggan->alamat ?></td>
	 		</tr>

	 	</tbody>
	 </table>
	
	  <hr>
	 <table class="table table-bordered ">
	 	<p>Produk yang di Beli</p>
	 	<thead>
	 		<tr class="bg-success">
	 			<th>No</th>
	 			<th>Kode Produk</th>
	 			<th>Nama Produk</th>
	 			<th>Jumlah</th>
	 			<th>Harga</th>
	 			<th>Sub Total</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<?php $i=1; foreach($transaksi as $transaksi) { ?>
	 		<tr>
	 			<td><?php echo $i?></td>
	 			<td><?php echo $transaksi->kode_produk ?></td>
	 			<td><?php echo $transaksi->nama_produk ?></td>
	 			<td><?php echo number_format($transaksi->jumlah)?></td>
	 			<td><?php echo number_format($transaksi->harga)?></td>
	 			<td><?php echo number_format($transaksi->total_harga)?></td>
	 			
	 		</tr>
	 		<?php $i++; } ?>
	 	</tbody>
	 </table>

	</div>
	
</body>
</html>