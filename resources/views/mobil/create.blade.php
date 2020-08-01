<form action="/mobil/store" method="POST" enctype="multipart/form-data" id="form-create">
    @csrf                             
    <div class="form-group">
      <div id="error-form-create"></div>
      <label for="dropdown">Brand Mobil</label>        
      <div>
        <select class="w-100 dropdown-menu pos-stc inline dark mb-3" name="brand_id">
          <option value="">Select</option>
          @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
          @endforeach
        </select>
      </div>
    </div>        
    <div class="form-group">
        <label for="no_plat">Nomor Plat</label>
        <input type="text" class="form-control" id="no_plat" name="no_plat">       
    </div>
    <div class="form-group">
        <label for="nama_mobil">Mobil</label>
        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil">
    </div>
    <div class="form-group">
        <label for="max_minyak">Kapasitas Minyak</label>
        <input type="number" class="form-control" id="max_minyak" name="max_minyak">
    </div>                
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>                
    <hr>            
      <div class="d-flex bd-highlight mb-3">
        <a href="{{ route('brand') }}" type="submit" class="mr-auto p-2 bd-highlight float-right btn btn-sm btn-fw black">Tambah Brand</a>
        <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
        <button type="button" onclick="kirimData()" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
      </div>            
</form>