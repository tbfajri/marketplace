
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="sec-title p-b-60">
	<h3 class="m-text5 t-center">
		Produk Rekomendasi
	</h3>
</div>

<div class="row">
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
	<div class="leftbar p-r-20 p-r-0-sm">
		<!--  -->
		<h4 class="m-text14 p-b-7">
			Kategori Produk
		</h4>

		<ul class="p-b-54">

			<?php foreach($listing_kategori as $listing_kategori) { ?>
			<li class="p-t-4">
				<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
					<?php echo $listing_kategori->nama_kategori; ?>
				</a>
			</li>	
		<?php } ?>
		</ul>
	</div>
</div>

	
<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
	

	<!-- Product -->
	<div class="row">

	<?php foreach($produk_list as $produk_list) { ?>	
		<div class="col-sm-1 col-md-4 p-b-1">

			<?php 
			echo form_open(base_url('belanja/add')); 
	// elemen yang di bawa
	echo form_hidden('id', $produk_list->id_produk);
	echo form_hidden('id_penjual', $produk_list->id_penjual);
	echo form_hidden('nama_toko', $produk_list->nama_toko);
	echo form_hidden('qty', 1);
	echo form_hidden('price', $produk_list->harga);
	echo form_hidden('name', $produk_list->nama_produk);
			// elemen redirect
			echo form_hidden('redirect_page', str_replace('index.php/', '',current_url()));

			?>
			<!-- Block2 -->
			<div class="block2">
				<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk_list->gambar) ?>" alt="<?php echo $produk_list->nama_produk ?>">

					<div class="block2-overlay trans-0-4">
						<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
							<i class="fa fa-eye" aria-hidden="true"></i>
							<i class="fa fa-eye dis-none" aria-hidden="true"></i>
						</a>

						<div class="block2-btn-addcart w-size1 trans-0-4">
							<!-- Button -->
							<?php if($this->session->userdata('email')) { ?>
							<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
								Add to Cart
							</button>
							
			<?php } ?>

						</div>
					</div>
				</div>

				<div class="block2-txt p-t-20">
					<a href="<?php echo base_url('produk/detail/'.$produk_list->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
					<span class="block2-price m-text6 p-r-5">
					Toko / IKM <br>
					<?php 
						# code...
						echo $produk_list->nama_toko
						 ?>
					</span>
					</a>
					<a href="<?php echo base_url('produk/detail/'.$produk_list->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
						<?php echo $produk_list->nama_produk ?>
					</a>

					<span class="block2-price m-text6 p-r-5">
						IDR <?php echo number_format($produk_list->harga, '0', ',','.') ?>
					</span>

				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	<?php } ?>

		
	</div>

	<!-- Pagination -->
	<div class="pagination flex-m flex-w p-t-26">
	<?php echo $pagin; ?>
	</div>
</div>
</div>
</div>
</section>

