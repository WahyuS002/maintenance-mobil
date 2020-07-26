{{-- <!-- plugins:js -->
<script src="{{ asset('staradmin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('staradmin/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('staradmin/assets/js/shared/off-canvas.js') }}"></script>
<script src="{{ asset('staradmin/assets/js/shared/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('staradmin/assets/js/demo_1/dashboard.js') }}"></script>
<!-- End custom js for this page--> --}}

<!-- build:js scripts/app.html.js -->

{{-- SCRIPTS --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- jQuery -->
<script src="{{ asset('flatkit/libs/jquery/jquery/dist/jquery.js') }}"></script>
<!-- Bootstrap -->
  <script src="{{ asset('flatkit/libs/jquery/tether/dist/js/tether.min.js') }}"></script>
  <script src="{{ asset('flatkit/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- core -->
  <script src="{{ asset('flatkit/libs/jquery/underscore/underscore-min.js') }}"></script>
  <script src="{{ asset('flatkit/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
  <script src="{{ asset('flatkit/libs/jquery/PACE/pace.min.js') }}"></script>

  <script src="{{ asset('flatkit/html/scripts/config.lazyload.js') }}"></script>

  <script src="{{ asset('flatkit/html/scripts/palette.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-load.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-jp.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-include.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-device.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-form.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-nav.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-screenfull.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-scroll-to.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-toggle-class.js') }}"></script>

  <script src="{{ asset('flatkit/html/scripts/app.js') }}"></script>

  <!-- ajax -->
  <script src="{{ asset('flatkit/libs/jquery/jquery-pjax/jquery.pjax.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ajax.js') }}"></script>
<!-- endbuild -->

  {{-- MY SCRIPT --}}

    @if (count($errors) > 0)
    <script>
        $( function() {
            $('#mymodal').modal('show');
        });
    </script>
    @endif  
  
    <script>
      jQuery(document).ready(function($){
          $('#mymodal').on('show.bs.modal', function(e){
              var button = $(e.relatedTarget);
              var modal = $(this);
  
              modal.find('.modal-body').load(button.data("remote"));
              modal.find('.modal-title').html(button.data("title"));
          });
      });
    </script>

  <div class="modal" id="mymodal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content box-shadow-md black lt m-b">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <i class="fa fa-spinner fa-spin"></i>
              </div>
          </div>
      </div>
  </div>