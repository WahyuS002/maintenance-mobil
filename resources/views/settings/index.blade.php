@extends('layouts.app')

@section('content')
<!-- content -->

<div id="status-success" data-toast="{{ session()->get('status-success') }}"></div>

<div id="content" class="app-content box-shadow-z0" role="main">
  <div class="app-header white box-shadow">
    <div class="navbar navbar-toggleable-sm flex-row align-items-center">
      <!-- Open side - Naviation on mobile -->
      <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
        <i class="material-icons">&#xe5d2;</i>
      </a>
      <!-- / -->

      <!-- Page title - Bind to $state's title -->
      <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

      <!-- navbar collapse -->
      <div class="collapse navbar-collapse" id="collapse">
        <!-- link and dropdown -->
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href data-toggle="dropdown">
              <i class="fa fa-fw fa-plus text-muted"></i>
              <span>New</span>
            </a>
            <div ui-include="'../views/blocks/dropdown.new.html'"></div>
          </li>
        </ul>

        <div ui-include="'../views/blocks/navbar.form.html'"></div>
        <!-- / -->
      </div>
      <!-- / navbar collapse -->

      <!-- navbar right -->
      <ul class="nav navbar-nav ml-auto flex-row">
        <li class="nav-item dropdown pos-stc-xs">
          <a class="nav-link mr-2" href data-toggle="dropdown">
            <i class="material-icons">&#xe7f5;</i>
            <span class="label label-sm up warn">3</span>
          </a>
          <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
            <span class="avatar w-32">
              <img src="../assets/images/a0.jpg" alt="...">
              <i class="on b-white bottom"></i>
            </span>
          </a>
          <div ui-include="'../views/blocks/dropdown.user.html'"></div>
        </li>
        <li class="nav-item hidden-md-up">
          <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
            <i class="material-icons">&#xe5d4;</i>
          </a>
        </li>
      </ul>
      <!-- / navbar right -->
    </div>
  </div>
  <div class="app-footer">
    <div class="p-2 text-xs">
      <div class="pull-right text-muted py-1">
        &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>
        <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
      </div>
      <div class="nav">
        <a class="nav-link" href="../">About</a>
        <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get it</a>
      </div>
    </div>
  </div>
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