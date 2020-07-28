<form action="/driver/store" method="POST" enctype="multipart/form-data" id="form-create">
    @csrf             
    <div id="error-form-create"></div>            
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="number" class="form-control" id="nik" name="nik">
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>                
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" onclick="kirimData()" class="btn btn-primary">Tambah</button>
    </div>
</form>