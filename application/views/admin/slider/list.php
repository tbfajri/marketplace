<p>
	<a href="<?php echo base_url('admin/slider/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah Baru
	</a>
</p>

<?php 
// notifikasi

if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

 ?>
<div class="box-body table-responsive no-padding">
 <table class="table table-bordered table-hover table-striped" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>NAMA</th>
 			<th>GAMBAR</th>
 			<th>SLUG</th>
 			<th>URUTAN</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1; foreach($slider as $slider) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $slider->nama_slider ?></td>
 			<td>
 				<img src="<?php echo base_url('assets/upload/image/thumbs/'. $slider->gambar)?>" class="img img-responsive img-thumbnail" width="60">
 			</td>
 			<td><?php echo $slider->slug_slider ?></td>
 			<td><?php echo $slider->urutan ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/slider/edit/'.$slider->id_slider)?>" class="btb btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

 				<a href="<?php echo base_url('admin/slider/delete/'.$slider->id_slider)?>" class="btb btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i>Delete</a>
 				
 			</td>
 			
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
</div>