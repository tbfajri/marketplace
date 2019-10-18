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
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
    <label for="inputEmail3" class="col-md-3 control-label">Nama Website</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="namaweb" placeholder="Nama Website " value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Tagline/Motto</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="tagline" placeholder="Tagline/Motto" value="<?php echo $konfigurasi->tagline ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Email</label>
    <div class="col-md-5">
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Website</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="website" placeholder="Website" value="<?php echo $konfigurasi->website ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Alamat Facebook</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="facebook" placeholder="facebook" value="<?php echo $konfigurasi->facebook ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Alamat Instagram</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="instagram" placeholder="instagram" value="<?php echo $konfigurasi->instagram ?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Telepon</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Alamat Kantor</label>
    <div class="col-md-9">
        <textarea name="alamat" class="form-control" placeholder="Alamat Kantor">
            <?php echo $konfigurasi->alamat ?>
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Keyword (Untuk SEO Google)</label>
    <div class="col-md-9">
        <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)">
            <?php echo $konfigurasi->keywords ?>
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Kode Metatext</label>
    <div class="col-md-9">
        <textarea name="metatext" class="form-control" placeholder=" Kode Metatext">
            <?php echo $konfigurasi->keywords ?>
        </textarea>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Deskripsi Website</label>
    <div class="col-md-9">
        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">
            <?php echo $konfigurasi->deskripsi ?>
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Rekening Pembayaran</label>
    <div class="col-md-9">
        <textarea name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran">
            <?php echo $konfigurasi->rekening_pembayaran ?>
        </textarea>
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