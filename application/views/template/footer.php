<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Logout dibawah ini untuk keluar</div>
          <div class="modal-footer">
            <form action="<?= base_url('logout') ?>" method="POST">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="<?= base_url() ?>asset/skp/libraries/jquery/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url() ?>asset/vendor/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>asset/skp/libraries/retina/retina.min.js"></script>
    <script src="<?= base_url() ?>asset/skp/libraries/ckeditor/ckeditor.js"></script>
    <script src="<?= base_url() ?>asset/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>asset/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
  $(document).ready(function() {
    var table = $('#example1').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
    </script>
  </body>

  </html>