<form action="/driver/store" method="POST" enctype="multipart/form-data" id="form-create">
    @csrf             
    <div id="error-form-create"></div>            
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
        <div class="text-danger mt-2" id="error-nama"></div>
    </div>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="number" class="form-control" id="nik" name="nik">
        <div class="text-danger mt-2" id="error-nik"></div>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        <div class="text-danger mt-2" id="error-foto"></div>
    </div>                
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" onclick="kirimData()" class="btn btn-primary">Tambah</button>
    </div>
</form>

{{-- Showing Error Script --}}
<script>
    function kirimData(){      
        $("#error-nama").html('')
        $("#error-nik").html('')
        $("#error-foto").html('')
        $("#form-create").ajaxSubmit({
        success:function(res){
            window.location.reload()        
        },
        error:function(e1,e2){              
            let nama = e1.responseJSON.errors.nama;        
            let nik = e1.responseJSON.errors.nik;        
            let foto = e1.responseJSON.errors.foto;        
            $("#error-nama").append(nama)
            $("#error-nik").append(nik)
            $("#error-foto").append(foto)
        }
        })
    }
  </script>