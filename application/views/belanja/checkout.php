 	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">

					<h1><?php echo $title ?></h1> <hr>
					<div class="clearfix"></div>
					<br><br>
					<?php $this->session->flashdata('sukses'); 
						echo '<div class="alert-warning">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					?>

					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">GAMBAR</th>
							<th class="column-2">PRODUK</th>
							<th class="column-3">HARGA</th>
							<th class="column-4 p-l-70">JUMLAH</th>
							<th class="column-5" width="15%">Sub Total</th>
							<th class="column-6" width="20%">Action</th>
						</tr>
						<?php 
					
							// loping data keranjang
						foreach($keranjang as $keranjang) {
							// ambil data produk
							$id_produk	= $keranjang['id'];
							$produk 	= $this->produk_model->detail($id_produk);

								// form update
							echo form_open(base_url('belanja/update_cart_check/'.$keranjang['rowid']));


							
						?>
						
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
								</div>
							</td>
							<td class="column-2"> <?php echo $keranjang['name'] ?></td>
							<td class="column-3">Rp. <?php echo number_format($keranjang['price'], '0',',','.') ?></td>
							<td class="column-4" align="center">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">Rp. 
								<?php 
								$sub_total = $keranjang['price'] * $keranjang['qty'];
								echo number_format($sub_total, '0',',','.');
								 ?>
							</td>
							<td>
								<button type="submit" value="update" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>Update
								</button>
								<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" name="hapus" class="btn btn-warning btn-sm">
									<i class="fa fa-trash"></i>Hapus
								</a>
							</td>
						</tr>
					<?php 
						// form close
						echo form_close();
						// end looping keranjang belanja
						} 
						
					?>
						<tr class="table-row bg-info text-strong" style="font-weight: bold; color: white !important;">
							<td colspan="4" class="column-1">Total Belanja  :</td>
							<td colspan="2" class="column-2"> Rp. <?php echo number_format($this->cart->total(),'0',',','.')?></td>
						</tr>

					</table>


					<br>

					<hr>
						<?php 
						echo form_open(base_url('belanja/checkout')); 
							$kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
							// loping data keranjang
						foreach($keranjang2 as $keranjang2) {
							// ambil data produk
							$id_produk	= $keranjang2['id'];
							$produk 	= $this->produk_model->detail($id_produk);
						?>
							<?php echo $keranjang2['id_penjual'] ?>
							<?php echo $keranjang2['nama_toko'] ?>
				
						<?php } ?>
					<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
					<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total(); ?>">
					<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
					<table class="table">
							<thead>
								<tr>
									<th width="25%">Kode Transaksi</th>
									<th><input type="text" name="kode_transaksi" class="form_control" value="<?php echo $kode_transaksi; ?>" readonly required></input></th>
								</tr>
								<tr>
									<th width="25%">Nama Penerima</th>
									<th><input type="text" name="nama_penerima" class="form_control" value="<?php echo $pelanggan->nama_pelanggan ?>" placeholder="Nama Lengkap"></input></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Email Penerima</td>
									<td><input type="email" name="email" class="form_control" value="<?php echo $pelanggan->email ?>" placeholder="Email"></input></td>
								</tr>
								<tr>
									<td>Telepon Penerima</td>
									<td><input type="text" name="telepon" class="form_control" value="<?php echo $pelanggan->telepon ?>" placeholder="telepon"></input></td>
								</tr>
								<tr>
									<td>Alamat Penerima</td>
									<td><textarea name="alamat" class="form-control" placeholder="alamat">
										<?php echo $pelanggan->alamat ?>
									</textarea></td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit" >
											<i class="fa fa-save"></i> Checkout Sekarang
										</button>
										<button class="btn btn-danger btn-lg" type="reset" >
											<i class="fa fa-times"></i> Reset
										</button>
									</td>
								</tr>
							</tbody>
						</table>

					<?php echo form_close(); ?>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">

				</div>
			</div>

			
		</div>
	</section>
