<?php 
// notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open_multipart(base_url('admin/kategori/edit/'.$kategori->id_kategori),' class="form-horizontal"');
?>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Nama Kategori Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?php echo $kategori->nama_kategori ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Urutan</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="urutan" placeholder="Urutan" value="<?php echo $kategori->urutan ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Upload Gambar Kategori</label>
    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control" required="required">
        <span>ukuran gambar 1920px x 239px</span>
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