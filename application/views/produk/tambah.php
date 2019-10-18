<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
    <div class="leftbar p-r-20 p-r-0-sm">
        <?php include('menu.php') ?>
    </div>
</div>

<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
    <p><h2>Tambahkan Produk </p></h2>
    <hr>
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
echo form_open_multipart(base_url('produk/tambah'),' class="form-horizontal"');
?>

      <input type="hidden" name="id_penjual" value="<?php echo $pelanggan->id_penjual ?>"> 
      <input type="hidden" name="nama_toko" value="<?php echo $pelanggan->nama_pelanggan ?>">
      <input type="hidden" name="harga" value="0">     

<div class="form-group form-group-lg">
    <label for="inputEmail3" class="col-md-2 control-label">Nama Produk</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk " value="<?php echo set_value('nama_produk')?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Kode Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="kode_produk" placeholder="Kode Produk " value="<?php echo set_value('kode_produk')?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-3 control-label">Kategori Produk</label>
    <div class="col-md-5">
        <select name="id_kategori" class="form-control">
            <?php foreach($kategori as $kategori) { ?>
            <option value="<?php echo $kategori->id_kategori ?>">
                <?php echo $kategori->nama_kategori ?>
            </option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Harga IKM</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="harga_ikm" placeholder="Harga Produk " value="<?php echo set_value('harga_ikm')?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Stok</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="stok" placeholder="Stok Produk " value="<?php echo set_value('stok')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Berat</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="berat" placeholder="Kode Produk " value="<?php echo set_value('berat')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Ukuran</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="ukuran" placeholder="Ukuran Produk " value="<?php echo set_value('ukuran')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Keterangan</label>
    <div class="col-md-10">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor">
            <?php echo set_value('keterangan') ?>
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-4 control-label">Keyword (Untuk SEO Google)</label>
    <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)">
            <?php echo set_value('keywords') ?>
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-4 control-label">Upload Gambar Produk</label>
    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control" required="required">
    </div>
</div>


<input type="hidden" name="status_produk" value="Draft">



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
</div>
</div>
</div>
</section>