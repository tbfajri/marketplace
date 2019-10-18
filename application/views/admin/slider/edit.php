<?php 
// notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open_multipart(base_url('admin/slider/edit/'.$slider->id_slider),' class="form-horizontal"');
?>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Nama Slider Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama_slider" placeholder="Nama Slider" value="<?php echo $slider->nama_slider ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Urutan</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="urutan" placeholder="Urutan" value="<?php echo $slider->urutan ?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Upload Gambar Produk</label>
    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control" >
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