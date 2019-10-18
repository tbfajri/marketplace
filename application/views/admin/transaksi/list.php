<table class="table table-bordered table-responsive" id="example3">
			 	<thead>
			 		<tr class="bg-success">
			 			<th>No</th>
			 			<th>Nama Pelanggan</th>
			 			<th>Kode Transaksi</th>
			 			<th>Tanggal</th>
			 			<th>Jumlah Total</th>
			 			<th>Jumlah Item</th>
			 			<th>Status Bayar</th>
			 			<th width="25%" >Action</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
			 		<tr>
			 			<td><?php echo $i++?></td>
			 			<td><?php echo $header_transaksi->nama_penerima ?>
			 				<br><small>
			 					Telepon: <?php echo $header_transaksi->telepon ?>
			 					<br>Email : <?php echo $header_transaksi->email ?>
			 					<br>Alamat Kirim: <?php echo nl2br($header_transaksi->alamat)?>
			 				</small>
			 			</td>
			 			<td><?php echo $header_transaksi->kode_transaksi ?></td>
			 			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			 			<td><?php echo number_format($header_transaksi->jumlah_transaksi )?></td>
			 			<td><?php echo $header_transaksi->total_item ?></td>
			 			<td><?php echo $header_transaksi->status_bayar ?></td>
			 			<td>
			 				<div class="btn-group">
			 				<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail</a>
							
			 				<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak</a>

			 				<a href="<?php echo base_url('admin/transaksi/status'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Update Status</a>
		
			 				</div>
			 				
			 				<div class="clearfix">
			 					<br>
			 				</div>
			 			</td>
			 		</tr>
			 		<?php }?>
			 	</tbody>
			 </table>

