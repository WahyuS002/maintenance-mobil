<form action="/mobil/store" method="POST" enctype="multipart/form-data" id="form-create">
    @csrf
    <div class="form-group">
      {{-- <div id="error-form-create"></div> --}}
      <label for="dropdown">Brand Mobil</label>
      <div>
        <select class="w-100 dropdown-menu pos-stc inline dark mb-3" name="brand_id">
          <option value="" disabled>Select</option>
          @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
          @endforeach
        </select>
      </div>
      <div class="text-danger mt-2" id="error-brand-id"></div>
    </div>
    <div class="form-group">
        <label for="no_plat">Nomor Plat</label>
        <input type="text" class="form-control" id="no_plat" name="no_plat">
        <div class="text-danger mt-2" id="error-no-plat"></div>
    </div>
    <div class="form-group">
        <label for="nama_mobil">Mobil</label>
        <input type="text" class="form-control" id="nama_mobil" name="nama_mobil">
        <div class="text-danger mt-2" id="error-nama-mobil"></div>
    </div>
    <div class="form-group">
        <label for="max_minyak">Kapasitas Minyak</label>
        <input type="number" class="form-control" id="max_minyak" name="max_minyak">
        <div class="text-danger mt-2" id="error-max-minyak"></div>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        <div class="text-danger mt-2" id="error-foto"></div>
    </div>
    <hr>
      <div class="d-flex bd-highlight mb-3">
        <a href="{{ route('brand') }}" type="submit" class="mr-auto p-2 bd-highlight float-right btn btn-sm btn-fw black">Tambah Brand</a>
        <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
        <button type="button" onclick="kirimData()" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
      </div>
</form>

{{-- Showing Error Script --}}
<script>
  function kirimData(){
      $("#error-brand-id").html('')
      $("#error-no-plat").html('')
      $("#error-nama-mobil").html('')
      $("#error-max-minyak").html('')
      $("#error-foto").html('')
      $("#form-create").ajaxSubmit({
      success:function(res){
          window.location.reload()
      },
      error:function(e1,e2){
          let brand_id = e1.responseJSON.errors.brand_id;
          let no_plat = e1.responseJSON.errors.no_plat;
          let nama_mobil = e1.responseJSON.errors.nama_mobil;
          let max_minyak = e1.responseJSON.errors.max_minyak;
          let foto = e1.responseJSON.errors.foto;
          $("#error-brand-id").append(brand_id)
          $("#error-no-plat").append(no_plat)
          $("#error-nama-mobil").append(nama_mobil)
          $("#error-max-minyak").append(max_minyak)
          $("#error-foto").append(foto)
      }
      })
  }
</script>