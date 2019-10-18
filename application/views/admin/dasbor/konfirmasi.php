

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">

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
			 
			 <?php 
			 // error upload
			 if(isset($error)){
			 	echo '<p class="alert alert-warning">' . $error . '</p>';
			 }

			 // notif error
			 echo validation_errors('<p class="alert alert-warning">', '</p>');

			 // form open
			 echo form_open_multipart(base_url('admin/dasbor/konfirmasi_admin/'.$header_transaksi->kode_transaksi));

			  ?>

			  <table class="table">
			  		<tbody>
			  		<tr>
			  			<td width="30%">Update Status</td>
			  			<td>
			  				<select name="status_bayar" class="form-control">
			  				
			  						<option value="Pembayaran Telah diterima admin, Pesanan anda telah dilanjutkan kepada Penjual">
			  							Pembayaran Telah diterima admin, Pesanan anda telah dilanjutkan kepada Penjual
			  						</option>
			  						<option value="Barang Sedang Dikemas">
			  							Barang Sedang Dikemas
			  						</option>
			  						<option value="Barang Sudah Dikirim">
			  							Barang Sudah Dikirim
			  						</option>
			  					
			  				</select>
			  			</td>
			  		</tr>
			  		
			  			<td>Nomor Resi</td>
			  			<td>
			  				<input type="text" name="nomor_resi" class="form-control"  placeholder="Input Nomor Resi">
			  			
			  			</td>
			  		</tr>
			  		<tr>
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
			echo form_close();

			// kalau ga ada tampilkan notifikasi
			}else{ ?>

				<p class="alert alert-success">
					<i class="fa fa-warning"></i> Belum ada data Transaksi
				</p>
			<?php } ?>
		

	
</div>
</div>
</div>
</section>

