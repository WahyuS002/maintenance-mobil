@extends('layouts.app')

@section('content')

<div id="status-error" data-toast="{{ session()->get('status-error') }}"></div>
<div id="status-success" data-toast="{{ session()->get('status-success') }}"></div>

<div ui-view class="app-body" id="view">

  <!-- ############ PAGE START-->
  <div class="row no-gutter">
    <div class="col-sm-3 col-lg-2">
      <div class="p-y">
        <div class="nav-active-border left b-primary">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a class="nav-link block" href="{{ route('settings') }}" >Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link block active" href="{{ route('setting.change-password') }}" data-toggle="tab" data-target="#tab-1">Ubah Password</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-lg-10 light lt">
      <div class="tab-content pos-rlt">

        {{-- TAB 1 --}}

        {{-- TAB 2 --}}

        {{-- <div class="tab-pane" id="tab-1"> --}}
          <div class="p-a-md dker _600">Ubah Password</div>
          @if (session('status'))
          <div class="alert alert-danger">
            {{ session('status') }}
          </div>
          @endif
          @if (session('success-status'))
          <div class="alert alert-success">
            {{ session('success-status') }}
          </div>
          @endif
          <form role="form" class="p-a-md col-md-6" action="{{ route('setting.password') }}"  method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
              <label>Password Lama</label>
              <input type="password" class="form-control" name="pw_lama" placeholder="**********" id="password_lama">
              @error('pw_lama')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Password Baru</label>
              <input type="password" class="form-control" name="pw_baru1" placeholder="**********" id="password_baru1">
              @error('pw_baru1')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" class="form-control" name="pw_baru2" placeholder="**********" id="password_baru2">
              @error('pw_baru2')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="float-right">
              <label class="mr-3 align-middle">Tampilkan Password</label>
              <label class="ui-switch info mt-2">
                <input type="checkbox" onclick="myFunction()">
                <i></i>
              </label>
            </div>

            <div>
              <button type="submit" class="btn btn-info mt-5">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- </div> --}}


    <!-- ############ PAGE END-->

  </div>
</div>
<!-- / -->
@endsection

@push('script-after')

<script>
  function myFunction() {
    var x = document.getElementById("password_lama");
    var y = document.getElementById("password_baru1");
    var z = document.getElementById("password_baru2");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
      z.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
      z.type = "password";
    }
  }
</script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/myscript.js') }}"></script>
@endpush