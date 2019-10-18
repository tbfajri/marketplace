<?php 
// notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open(base_url('admin/rekening/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Nama Bank</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank " value="<?php echo set_value('nama_bank')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Nomor Rekening</label>
    <div class="col-md-5">
        <input type="number" class="form-control" name="nomor_rekening" placeholder="nomor rekening " value="<?php echo set_value('nomor_rekening')?>" required>
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Nama Pemilik Rekening (atas nama)</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="nama_pemilik" placeholder="nama pemilik " value="<?php echo set_value('nama_pemilik')?>" required>
    </div>
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