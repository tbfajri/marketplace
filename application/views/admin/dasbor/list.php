
 
    <h2>Daftar Transaksi</h2>
   

    <?php 
      // kalau ada transaksi, tampilkan tabel
      if($header_transaksi) {
       ?>
       <div class="box-body table-responsive no-padding">
       <table class="table table-bordered table-responsive" id="example1" >
        <thead>
          <tr class="bg-success">
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Nama Pembeli</th>
            <th>Tanggal</th>
            <th>Jumlah Total</th>
            <th>Jumlah Item</th>
            <th>Status Bayar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $header_transaksi->kode_transaksi ?></td>
            <td><?php echo $header_transaksi->nama_penerima ?></td>
            <td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
            <td><?php echo number_format($header_transaksi->jumlah_transaksi )?></td>
            <td><?php echo $header_transaksi->total_item ?></td>
            <td><?php echo $header_transaksi->status_bayar ?></td>
            <td>
              <div class="btn-group">
              <a href="<?php echo base_url('admin/dasbor/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>Detail</a>

              <a href="<?php echo base_url('admin/dasbor/konfirmasi_admin/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-xs"><i class="fa fa-upload"></i>Konfirmasi Bayar</a>
              
              </div>
            </td>
          </tr>
          <?php $i++; } ?>
        </tbody>
       </table>


      <?php }else{ ?>

        
        <p class="alert alert-success">
          <i class="fa fa-warning"></i> Belum ada data Transaksi
        </p>
      <?php } ?>
    
    
  </div>




