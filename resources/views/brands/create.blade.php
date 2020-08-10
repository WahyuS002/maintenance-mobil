<form action="/brand/store" method="POST" id="form-create">
    @csrf   
    {{-- <div id="error-form-create"></div>  --}}
    <div class="form-group">
        <label for="nama_brand">Nama Brand</label>
        <input type="text" class="form-control" id="nama_brand" name="nama_brand">
        <div class="text-danger mt-2" id="error-form-create">

        </div>             
    </div>                           
    <hr>            
      <div class="d-flex bd-highlight mb-3">
        <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
        <button type="button" onclick="kirimData()" id="tambah_brand" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
      </div>            
</form>
    
{{-- Showing Error Script --}}
<script>
function kirimData(){      
    $("#error-form-create").html('')
    $("#form-create").ajaxSubmit({
    success:function(res){
        window.location.reload()        
    },
    error:function(e1,e2){              
        let errors = e1.responseJSON.errors.nama_brand;        
        $("#error-form-create").append(errors)
    }
    })
}
</script>