<form action="/brand/store" method="POST">
    @csrf                  
    <div class="form-group">
        <label for="nama_brand">Nama Brand</label>
        <input type="text" class="form-control" id="nama_brand" name="nama_brand">
        @error('nama_brand')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror                  
    </div>                           
    <hr>            
      <div class="d-flex bd-highlight mb-3">
        <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
        <button type="submit" id="tambah_brand" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
      </div>            
</form>
