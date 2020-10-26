@extends('layouts.app')

@section('content')
<!-- content -->

<div id="status-success" data-toast="{{ session()->get('status-success') }}"></div>

<div ui-view class="app-body" id="view">

  <!-- ############ PAGE START-->
  <div class="row no-gutter">
    <div class="col-sm-3 col-lg-2">
      <div class="p-y">
        <div class="nav-active-border left b-primary">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a class="nav-link block active" href data-toggle="tab" data-target="#tab-1">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link block" href="{{ route('setting.change-password') }}" >Ubah Password</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-lg-10 light lt">
      <div class="tab-content pos-rlt">

        {{-- TAB 1 --}}

        <div class="tab-pane active" id="tab-1">
          <div class="p-a-md dker _600">Profil Publik</div>
          <form role="form" class="p-a-md" action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="row">

              <div class="col-md-4">
                <div class="form-group text-center">
                  <label>Foto Profil</label>
                  <div class="form-file">
                    <img id="image-preview" alt="" src="{{ url('storage/'.$driver->foto ) }}" style="width: 200px"/>
                    <br>
                    <input type="file" name="foto" id="image-source" onchange="previewImage();">
                    <button type="button" class="btn white mt-3">Unggah Foto</button>
                  </div>
                </div>
              </div>

              <div class="col-md-8 px-5">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" value="{{ $driver->nama }}" name="nama">
                  @error('nama')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" value="{{ $driver->nik }}" name="nik">
                  @error('nik')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" value="{{ $driver->alamat }}" name="alamat">
                  @error('alamat')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>No.HP</label>
                  <input type="text" class="form-control" value="{{ $driver->no_hp }}" name="no_hp">
                  @error('no_hp')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <div>
                    <input type="radio" value="p" name="jk" {{ ($driver->jk == 'p') ? 'checked' : '' }}> Perempuan
                    <input type="radio" class="ml-3" value="l" name="jk" {{ ($driver->jk == 'l') ? 'checked' : '' }}> Laki-Laki
                  </div>
                </div>
                <button type="submit" class="btn btn-info float-right">Update</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ############ PAGE END-->

</div>
<!-- / -->

<script>
  function previewImage() {
    document.getElementById("image-preview").style.display = "text-center";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image-source").files[0]); oFReader.onload = function(oFREvent)
    {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
@endsection

@push('script-after')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/myscript.js') }}"></script>
@endpush