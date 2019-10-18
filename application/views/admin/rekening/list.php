<p>
	<a href="<?php echo base_url('admin/rekening/tambah') ?>" class="btn btn-success btn-lg">
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
 			<th>NAMA BANK</th>
 			<th>NOMOR REKENING</th>
 			<th>PEMILIK</th>
 			<th>ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no = 1; foreach($rekening as $rekening) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $rekening->nama_bank ?></td>
 			<td><?php echo $rekening->nomor_rekening ?></td>
 			<td><?php echo $rekening->nama_pemilik ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/rekening/edit/'.$rekening->id_rekening)?>" class="btb btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

 				<a href="<?php echo base_url('admin/rekening/delete/'.$rekening->id_rekening)?>" class="btb btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i>Delete</a>
 				
 			</td>
 			
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
</div>