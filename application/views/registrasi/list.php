 	<!-- Cart -->
	<section class="bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="pos-relative">
				<div class=" bgwhite">

					<h1><?php echo $title ?></h1> <hr>
					<div class="clearfix"></div>
					<br><br>

					<?php $this->session->flashdata('sukses'); 
						echo '<div class="alert-warning">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					?>

					<p class="alert alert-success">Sudah Memiliki akun ? Silakan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login Disini</a></p>

					<div class="col-md-12">

						<?php 
						// display error
						echo validation_errors('<div class="alert alert-warning">', '</div>');

						// form open
						echo form_open(base_url('registrasi')); ?>

						<table class="table">
							<thead>
								<tr>
									<th width="25%">Nama</th>
									<th><input type="text" name="nama_pelanggan" class="form_control" value="<?php echo set_value('nama_pelanggan') ?>" placeholder="Nama Lengkap" required></input></th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td width="25%">User Id Toko</td>
									<td><input type="text" name="id_penjual" class="form_control" value="<?php echo set_value('id_penjual') ?>" placeholder="Id Toko" required></input></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><input type="email" name="email" class="form_control" value="<?php echo set_value('email') ?>" placeholder="Email" required></input></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password" class="form_control" value="<?php echo set_value('password') ?>" placeholder="password" required></input></td>
									
								</tr>
								<tr>
									<td>Telepon</td>
									<td><input type="text" name="telepon" class="form_control" value="<?php echo set_value('telepon') ?>" placeholder="telepon" required></input></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><textarea name="alamat" class="form-control" placeholder="alamat" required>
										<?php echo set_value('alamat') ?>
									</textarea></td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit" >
											<i class="fa fa-save"></i> Submit
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



			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">

				</div>
			</div>

			
		</div>
	</section>
