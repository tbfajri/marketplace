<p>
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-lg">
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
 			<th>EMAIL</th>
 			<th>No Rekening</th>
 			<th>Alamat</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1; foreach($ikm as $ikm) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $ikm->nama_pelanggan ?></td>
 			<td><?php echo $ikm->email ?></td>
 			<td><?php echo $ikm->no_rekening ?></td>
 			<td><?php echo $ikm->alamat ?></td>
 			
 			<td>
 				<a href="<?php echo base_url('admin/user/edit/'.$ikm->id_pelanggan)?>" class="btb btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

 				<a href="<?php echo base_url('admin/user/delete/'.$ikm->id_pelanggan)?>" class="btb btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i>Delete</a>
 				
 			</td>
 			
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
</div>