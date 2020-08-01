@extends('layouts.app')

@section('content')
    <!-- content -->
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
            <a class="nav-link block" href="{{ route('settings') }}" >Profil</a>
          </li>
          <li class="nav-item">
            {{-- <a class="nav-link block" href data-toggle="tab" data-target="#tab-2">Ubah Password</a>             --}}
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
            <input type="text" class="form-control" name="pw_lama">
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="text" class="form-control" name="pw_baru1">
            @error('pw_baru1')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="text" class="form-control" name="pw_baru2">
            @error('pw_baru1')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>
      </div>      
    </div>
  </div>
{{-- </div> --}}


<!-- .modal -->
<div id="modal" class="modal fade animate black-overlay" data-backdrop="false">
  <div class="row-col h-v">
    <div class="row-cell v-m">
      <div class="modal-dialog modal-sm">
        <div class="modal-content flip-y">
          <div class="modal-body text-center">          
            <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
            <p>Are you sure to delete your account?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn white p-x-md" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">Yes</button>
          </div>
        </div><!-- /.modal-content -->
      </div>
    </div>
  </div>
</div>
<!-- / .modal -->

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->
@endsection