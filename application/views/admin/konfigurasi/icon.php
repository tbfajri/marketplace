<?php 
// notifikasi

if($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

 ?>

<?php 
// error upload
if(isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
// notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open_multipart(base_url('admin/konfigurasi/icon'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
    <label for="inputEmail3" class="col-md-3 control-label">Nama Website</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="namaweb" placeholder="Nama Website " value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Upload Icon Baru</label>
    <div class="col-md-5">
        <input type="file" class="form-control" name="icon" placeholder="Upload Logo baru" value="<?php echo $konfigurasi->icon ?>" required>
        Icon Lama : <br> <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail" width="200">
    </div>
</div>



<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label"></label>
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