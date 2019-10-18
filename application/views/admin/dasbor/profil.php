

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">


<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
	

	
			<h1><?php echo $title; ?></h1>
			<hr>

			<?php 

			// notifikasi
			if($this->session->flashdata('sukses')){
				echo '<div class="alert alert-warning">';
				echo $this->session->flashdata('sukses');
				echo '</div>';
			}
						// display error
						echo validation_errors('<div class="alert alert-warning">', '</div>');

						// form open
						echo form_open(base_url('dasbor/profil')); ?>

						<table class="table">
							<thead>
								<tr>
									<th width="25%">Nama</th>
									<th><input type="text" name="nama_pelanggan" class="form_control" value="<?php echo $pelanggan->nama_pelanggan ?>" placeholder="Nama Lengkap"></input></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Email</td>
									<td><input type="email" name="email" class="form_control" value="<?php echo $pelanggan->email ?>" placeholder="Email" readonly></input></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password" class="form_control" value="<?php echo set_value('password') ?>" placeholder="password"></input><br>
										<span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru</span>
									</td>

								</tr>
								<tr>
									<td>Telepon</td>
									<td><input type="text" name="telepon" class="form_control" value="<?php echo $pelanggan->telepon ?>" placeholder="telepon"></input></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><textarea name="alamat" class="form-control" placeholder="alamat">
										<?php echo $pelanggan->alamat ?>
									</textarea></td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit" >
											<i class="fa fa-save"></i> Update Profil
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
</div>
</section>

