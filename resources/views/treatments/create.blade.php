<form action="/treatment/store" method="POST" enctype="multipart/form-data" id="form-create">
    @csrf
    <div id="error-form-create"></div>                                         
    <div class="form-group">
      <label for="dropdown">Mobil</label>        
      <div>
        <select class="w-100 dropdown-menu pos-stc inline dark mb-3" name="mobil_id">
          <option value="">Select</option>
          @foreach($mobils as $mobil)
            <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
          @endforeach
        </select>
      </div>
    </div>        
    <div class="form-group">
        <label for="jenis">Jenis Perawatan</label>
        <input type="text" class="form-control" id="jenis" name="jenis">                  
    </div>            
    <div class="form-group">
        <label for="waktu">Waktu</label>
        <input type="date" class="form-control" id="waktu" name="waktu">
    </div>                            
    <hr>            
      <div class="d-flex bd-highlight mb-3">
        <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
        <button type="button" onclick="kirimData()" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
      </div>            
</form>