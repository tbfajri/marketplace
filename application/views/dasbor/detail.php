

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
	<div class="leftbar p-r-20 p-r-0-sm">
		<?php include('menu.php') ?>
	</div>
</div>

<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
	

	
			<h1><?php echo $title; ?></h1>
			<hr>
			<p>Berikut adalah riwayat belanja anda</p>

			<?php 
			// kalau ada transaksi, tampilkan tabel
			if($header_transaksi) {
			 ?>
			 <table class="table table-bordered table-responsive">
			 	<thead>
			 		<tr>
			 			<th width="20%">Kode Transaksi</th>
			 			<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<tr>
			 			<td>Tanggal</td>
			 			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			 		</tr>
			 		<tr>
			 			<td>Jumlah Total</td>
			 			<td><?php echo number_format($header_transaksi->jumlah_transaksi )?></td>
			 		</tr>
			 		<tr>
			 			<td>Status Bayar</td>
			 			<td><?php echo $header_transaksi->status_bayar ?></td>
			 		</tr>
			 		
			 	</tbody>
			 </table>
			 <table class="table table-bordered table-responsive">
			 	<thead>
			 		<tr class="bg-success">
			 			<th>No</th>
			 			<th>Kode Produk</th>
			 			<th>Nama Produk</th>
			 			<th>Status Barang</th>
			 			<th>No Resi</th>
			 			<th>Jumlah</th>
			 			<th>Harga</th>
			 			<th>Sub Total</th>
			 			<?php $i=1; foreach($transaksi as $test) { ?>
			 			<?php if($test->status_barang == "Barang Sudah di Kirim") { ?>
			 			<th>Konfirmasi Barang</th>
			 		<?php }
			 				} ?>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php $i=1; foreach($transaksi as $transaksi) { ?>
			 		<tr>

			 			
			 			<td><?php echo $i?></td>
			 			<td><?php echo $transaksi->kode_produk ?></td>
			 			<td><?php echo $transaksi->nama_produk ?></td>
			 			<td><?php echo $transaksi->status_barang ?></td>
			 			<td><?php echo $transaksi->no_resi ?></td>
			 			<td><?php echo number_format($transaksi->jumlah)?></td>
			 			<td><?php echo number_format($transaksi->harga)?></td>
			 			<td><?php echo number_format($transaksi->total_harga)?></td>
			 			<?php if($transaksi->status_barang == "Barang Sudah di Kirim") { ?>
			 			<td>
			 				<form action="<?php echo base_url('dasbor/diterima/'.$transaksi->kode_transaksi)?>" method="post">
			 					
			 				
			 				<input type="hidden" name="id_transaksi" value="<?php echo $transaksi->id_transaksi ?>">
			 			
			 				<input type="hidden" name="status_barang" value="Barang Sudah Diterima">
			 				<button type="submit" class="btn btn-warning btn-xs" onclick="return confirm('Yakin barang tersebut Sudah Diterima ?')"><i class="fa fa-edit"></i>Sudah Diterima</button>
			 			</form>
 				<br>
			 			</td>
			 		<?php } ?>
			 		</tr>
			 		<?php $i++; } ?>
			 	</tbody>
			 </table>


			<?php }else{ ?>

				<p class="alert alert-success">
					<i class="fa fa-warning"></i> Belum ada data Transaksi
				</p>
			<?php } ?>

			

			
		

	
</div>
</div>
</div>
</section>

