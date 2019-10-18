<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
    <div class="leftbar p-r-20 p-r-0-sm">
        <?php include('menu.php') ?>
    </div>
</div>
<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
<p>
	<a href="<?php echo base_url('produk/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah Baru
	</a>

</p>
<hr>
<?php 
// notifikasi

if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

 ?>

		<table class="table table-bordered table-hover table-striped" id="example1">
			<thead>
				<tr>
					<th>NO</th>
					<th>GAMBAR</th>
					<th>NAMA</th>
					<th>KATEGORI</th>
					<th>HARGA JUAL</th>
					<th>HARGA IKM</th>
					<th>STATUS</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach($produk as $produk) { ?>

				<tr>
					<td><?php echo $no++ ?></td>
					<td>
						<img src="<?php echo base_url('assets/upload/image/thumbs/'. $produk->gambar)?>" class="img img-responsive img-thumbnail" width="60">
					</td>
					<td><?php echo $produk->nama_produk ?></td>
					<td><?php echo $produk->nama_kategori ?></td>
					<td><?php echo number_format($produk->harga, '0',',','.') ?></td>
					<td><?php echo number_format($produk->harga_ikm, '0',',','.') ?></td>
					<td><?php echo $produk->status_produk ?></td>
					<td>
						<a href="<?php echo base_url('produk/gambar/'.$produk->id_produk)?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i>Gambar (<?php echo $produk->total_gambar; ?>)</a>

						<a href="<?php echo base_url('produk/edit/'.$produk->id_produk)?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

						<?php include ('delete.php'); ?>
						
					</td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>

</div>
</div>
</div>
</section>