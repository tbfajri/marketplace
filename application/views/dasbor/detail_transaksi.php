<section class="bgwhite p-t-55 p-b-65">

<div class="container">
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
	<div class="leftbar p-r-20 p-r-0-sm">
		<?php include('menu.php') ?>
	</div>
</div>
<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('belanja/cetak/'.$header_transaksi->kode_transaksi) ?>" target="blank" title="Cetak" class="btn btn-success btn-sm">
		<i class="fa fa-print"></i> Cetak	
		</a>
		<a href="<?php echo base_url('dasbor/list_penjualan')?>" title="Kembali" class="btn btn-info btn-sm">
		<i class="fa fa-backward"></i> Kembali	
		</a>
	</div>
</p>
<br>
<br>
	 <table class="table table-bordered table-responsive">
	 	<thead>
	 		<tr>
	 			<th width="20%">Nama Pelanggan</th>
	 			<th> <?php echo $header_transaksi->nama_pelanggan ?></th>
	 		</tr>
	 		<tr>
	 			<th width="20%">Kode Transaksi</th>
	 			<th> <?php echo $header_transaksi->kode_transaksi ?></th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<tr>
	 			<td>Tanggal</td>
	 			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
	 		</tr>
	 		<tr>
	 			<td>Status Bayar</td>
	 			<td><?php echo $header_transaksi->status_bayar ?></td>
	 		</tr>
	 		<tr>
	 			<td>Bukti Bayar</td>
	 			<td><?php if($header_transaksi->status_bayar =="Belum"){ echo "Belum ada"; } else {?>
	 				<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar)?>" class="img img-thumbnail" width="200">
	 			<?php } ?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>Tanggal Bayar</td>
	 			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_bayar)) ?></td>
	 		</tr>
	 		
	 		<tr>
	 			<td>Pembayaran Dari</td>
	 			<td>: <?php echo $header_transaksi->nama_bank ?> No. Rekening <?php echo $header_transaksi->rekening_pembayaran ?> a.n <?php echo $header_transaksi->rekening_pelanggan ?>
	 				
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>Pembayaran ke Rekening</td>
	 			<td>: <?php echo $header_transaksi->bank ?> No. Rekening <?php echo $header_transaksi->nomor_rekening ?> a.n <?php echo $header_transaksi->nama_pemilik ?>
	 				
	 			</td>
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
	 			
	 		</tr>
	 	</thead>
	 	<tbody>
	 		
	 		<?php $i=1; 
	 		$omset = 0;
	 		foreach($transaksi as $transaksi) { ?>
	 		<tr>
	 			
	 			<td><?php echo $i?></td>
	 			<td><?php echo $transaksi->kode_produk ?></td>
	 			<td><?php echo $transaksi->nama_produk ?></td>
	 			<td><?php echo $transaksi->status_barang ?></td>
	 			<td><?php echo $transaksi->no_resi ?></td>
	 			<td><?php echo number_format($transaksi->jumlah)?></td>
	 			<td><?php echo number_format($transaksi->harga)?></td>
	 			<td><?php echo number_format($transaksi->total_harga)?></td>
	 	
	 		</tr>
	 		
	 		<?php 
			$omset = $omset + ($transaksi->total_harga);		

	 		$i++; } ?>
	 		<tr> <td colspan="6" align="right">Jumlah Total </td><td colspan="3" align="right"><?php echo "Rp " . number_format($omset) ?></td> </tr>
	 	</tbody>
	 </table>
	
</div>
</div>
</div>
</section>