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
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
    <label for="inputEmail3" class="col-md-2 control-label">Nama Produk</label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk " value="<?php echo $produk->nama_produk ?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Kode Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="kode_produk" placeholder="Kode Produk " value="<?php echo $produk->kode_produk?>" required>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Kategori Produk</label>
    <div class="col-md-5">
        <select name="id_kategori" class="form-control">
            <?php foreach($kategori as $kategori) { ?>
            <option value="<?php echo $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori) {echo "selected";} ?>>
                <?php echo $kategori->nama_kategori ?>
            </option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Harga</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="harga" placeholder="Harga Produk " value="<?php echo $produk->harga ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Harga IKM</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="harga_ikm" placeholder="Harga Produk Ikm" value="<?php echo $produk->harga_ikm ?>" required readonly>
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Stok</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="stok" placeholder="Stok Produk " value="<?php echo $produk->stok?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Berat</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="berat" placeholder="Kode Produk " value="<?php echo $produk->berat?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Ukuran</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="ukuran" placeholder="Ukuran Produk " value="<?php echo $produk->ukuran ?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Keterangan</label>
    <div class="col-md-10">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor">
            <?php echo $produk->keterangan ?>
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Keyword (Untuk SEO Google)</label>
    <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)">
            <?php echo $produk->keywords ?>
        </textarea>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Upload Gambar Produk</label>
    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control" >
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Status Produk</label>
    <div class="col-md-10">
        <select name="status_produk" class="form-control">
            <option value="Publish">Publikasikan</option>
           <option value="Draft" <?php if($produk->status_produk=="Draf"){echo "selected";} ?>>Simpan Sebagai Draf</option>
           
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