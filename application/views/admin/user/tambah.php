<?php 
// notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open(base_url('admin/user/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Nama User</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama" placeholder="Nama User " value="<?php echo set_value('nama')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Email</label>
    <div class="col-md-5">
        <input type="email" class="form-control" name="email" placeholder="Email " value="<?php echo set_value('email')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Username</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Hak Akses</label>
    <div class="col-md-5">
        <select name="akses_level" class="form-control">
        	<option value="Admin">Admin</option>
        	<option value="User">User</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
        	<i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
        	<i class="fa fa-save"></i> Riset
        </button>
    </div>
</div>


<?php echo form_close(); ?>