<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#delete-<?php echo $transaksi->id_produk ?>">
              <i class="fa fa-check-circle-o"></i> Diterima
 </button>
<input type="hidden" name="id_pelanggan" value="<?php echo $transaksi->id_pelanggan?>">
 <div class="modal fade" id="delete-<?php echo $transaksi->id_produk ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">APAKAH ANDA TELAH MENERIMA PRODUK TERSEBUT ?</h4>
              </div>
              <div class="modal-body">
                  <div class="callout callout-warning">
			        <h4>PERINGATAN!!</h4>
			      Yakin telah menerima barang ini? Data yang telah di diterima tidak dapat dikembalikan
			      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <a href="<?php echo base_url('dasbor/diterima/'.$transaksi->kode_transaksi)?>" class="btn btn-success"><i class="fa fa-check-circle-o"></i> Ya Barang Diterima </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->