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

					<p class="alert alert-success">Belum Memiliki akun ? Silakan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-info btn-sm">Registrasi Disini</a></p>

					<div class="col-md-12">

						<?php 
						// display error
						echo validation_errors('<div class="alert alert-warning">', '</div>');

						// display notifikasi error login
						if ($this->session->flashdata('warning')) {
							# code...
							echo '<div class="alert alert-warning">';
							echo $this->session->flashdata('warning');
							echo '</div>';
						}

						if($this->session->flashdata('sukses')) {
							echo '<div class="alert alert-success">';
							echo $this->session->flashdata('sukses');
							echo '</div>';
						}

						// form open
						echo form_open(base_url('masuk')); ?>

						<table class="table">
							
							<tbody>
								<tr>
									<td width="20%">Email (Username)</td>
									<td><input type="email" name="email" class="form_control" value="<?php echo set_value('email') ?>" placeholder="Email"></input></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password" class="form_control" value="<?php echo set_value('password') ?>" placeholder="password"></input></td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit" >
											<i class="fa fa-save"></i> Login
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
