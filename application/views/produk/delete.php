<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $produk->id_produk ?>">
              <i class="fa fa-trash-o"></i>Delete
 </button>

 <div class="modal fade" id="delete-<?php echo $produk->id_produk ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">HAPUS DATA PRODUK</h4>
              </div>
              <div class="modal-body">
                  <div class="callout callout-warning">
			        <h4>PERINGATAN!!</h4>
			      Yakin ingin menghapus data ini? Data yang telah di hapus tidak dapat dikembalikan
			      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                <a href="<?php echo base_url('produk/delete/'.$produk->id_produk)?>" class="btn btn-danger"><i class="fa fa-trash-o"></i>Ya Hapus Data ini </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->