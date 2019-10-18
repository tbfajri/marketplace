

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
			<p>Berikut adalah riwayat penjualan anda</p>

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
			 			<td>Status</td>
			 			<td><?php echo $header_transaksi->status_bayar ?></td>
			 		</tr>
			 		<tr>
			 			<td>Nomor Resi</td>
			 			<td><?php echo $header_transaksi->nomor_resi ?></td>
			 		</tr>
			 		<tr>
			 			<td>Stastus Bayar</td>
			 			<td><?php if($header_transaksi->bukti_bayar !=""){ ?>
			 					<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
			 				<?php } else{ echo 'Belum ada bukti bayar'; } ?>
			 			</td>
			 		</tr>
			 	</tbody>
			 </table>

			 <hr>
			 <hr>
			 

			<?php 
			// form close
			

			// kalau ga ada tampilkan notifikasi
			}else{ ?>
				<br>
				<p class="alert alert-success">
					<i class="fa fa-warning"></i> Belum ada data Transaksi
				</p>
			<?php } ?>


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
	 		</tr>
	 	</thead>
	 	<tbody>
	 		
	 		<?php $i=1; 
	 		$omset = 0;
	 		foreach($transaksi_penjual as $transaksi_penjual) { ?>
	 		<tr>
	 			
	 			<td><?php echo $i?></td>
	 			<td><?php echo $transaksi_penjual->kode_produk ?></td>
	 			<td><?php echo $transaksi_penjual->nama_produk ?></td>
	 			<td><?php echo $transaksi_penjual->status_barang ?></td>
	 			<td><?php echo $transaksi_penjual->no_resi ?></td>
	 			<td><?php echo number_format($transaksi_penjual->jumlah)?></td>
	 			<td><?php echo number_format($transaksi_penjual->harga)?></td>
	 			<td><?php echo number_format($transaksi_penjual->total_harga)?></td>
	 		</tr>
	 		
	 		<?php 
			$omset = $omset + ($transaksi_penjual->total_harga);		

	 		$i++; } ?>
	 		<tr> <td colspan="6" align="right">Jumlah Total </td><td colspan="2" align="right"><?php echo "Rp " . number_format($omset) ?></td> </tr>
	 	</tbody>
	 </table>

	  <?php 
			 // error upload
			 if(isset($error)){
			 	echo '<p class="alert alert-warning">' . $error . '</p>';
			 }

			 // notif error
			 echo validation_errors('<p class="alert alert-warning">', '</p>');

			 // form open
			 echo form_open_multipart(base_url('dasbor/update_status/'.$header_transaksi->kode_transaksi));

			  ?>
			  <input type="hidden" name="id_penjual" value="<?php echo $transaksi_penjual->id_penjual; ?>">
			  <input type="hidden" name="kode_transaksi" value="<?php echo $transaksi_penjual->kode_transaksi; ?>">
			  <table class="table">
			  		<tbody>
			  		<tr>
			  			<td>Status Barang</td>
			  			<td>
			  				<select name="status_barang" class="form-control">
			  					
			  						<option value="Barang Sedang di Kemas"> Barang Sedang Dikemas</option>
			  						<option value="Barang Sudah di Kirim"> Barang Sudah Dikirim</option>
			  					
			  				</select>
			  			</td>
			  		</tr>
			  		
			  		<tr>
			  			<td>No Resi</td>
			  			<td>
			  				<input type="text" name="no_resi" class="form-control" placeholder="Input Resi">
			  			</td>
			  		</tr>
			  	
			  			<td></td>
			  			<td>
			  				<div class="btn-group">
			  					<button class="btn btn-success btn-lg" type="submit" name="submit"><i class="fa fa-upload"></i> Submit</button>
			  					<button class="btn btn-info btn-lg" type="reset" name="reset"><i class="fa fa-times"></i> Reset</button>
			  				</div>
			  			</td>
			  		</tr>
			  	</tbody>
			  </table>

			<?php 
			// form close
			echo form_close(); ?>
	
		

	
</div>
</div>
</div>
</section>

