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
  {{-- <script src="{{ asset('flatkit/html/scripts/ui-screenfull.js') }}"></script> --}}
  <script src="{{ asset('flatkit/html/scripts/ui-scroll-to.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ui-toggle-class.js') }}"></script>

  <script src="{{ asset('flatkit/html/scripts/app.js') }}"></script>

  <!-- ajax -->
  <script src="{{ asset('flatkit/libs/jquery/jquery-pjax/jquery.pjax.js') }}"></script>
  <script src="{{ asset('flatkit/html/scripts/ajax.js') }}"></script>
  <script src="{{ asset('js/jquery.form.min.js')}}"></script>
<!-- endbuild -->

  {{-- MY SCRIPT --}}
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

    {{-- Showing Error Script --}}
    <script>
      function kirimData(){      
        $("#error-form-create").html('')
        $("#form-create").ajaxSubmit({
          success:function(res){
            window.location.reload()        
          },
          error:function(e1,e2){              
            let errors = e1.responseJSON.errors;
            let tampilan = '<ul>';
            for(let error_key1 in errors){
              for(let error_key2 in errors[error_key1]){            
                tampilan+=`<li>${errors[error_key1][error_key2]}</li>`            
              }
            }
            tampilan+='</ul>';
            $("#error-form-create").append(tampilan)
          }
        })
      }
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