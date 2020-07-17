@php
  $brands = App\Brand::get();    
@endphp

@extends('layouts.app')

@section('content')
<div ui-view class="app-body" id="view">
  <div class="padding">
    <div class="margin">
      <div class="row d-flex align-items-center">
        <div class="col-md-0">
          <h5 class="mb-0 _300">Mobil</h5>
        </div>
        <div class="col-md-0">
          <a class="btn btn-sm btn-icon white" data-toggle="modal" data-target="#tambahModalMobil">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>         
    </div>
    <div class="row">      
      <div class="col-md-9">
        <div class="row">
          @foreach ($mobils as $mobil)
            <div class="col-xs-6 col-sm-4 col-md-3">
              <div class="box p-a-xs">
                <a href="/mobil/{{ $mobil->id }}/edit" data-toggle="modal" data-target="#editModal{{ $mobil->id }}"><img src="{{ url('storage/'.$mobil->foto) }}" alt="" class="img-responsive fit-image"></a>
                <div class="p-a-sm">
                  <div class="text-ellipsis">{{ $mobil->nama_mobil }}</div>
                  <span class="text-muted">{{ $mobil->brand->nama_brand }}</span>
                  <div class="mt-2">
                    <a href="/mobil/{{ $mobil->id }}/edit" data-toggle="modal" data-target="#editModal{{ $mobil->id }}">                      
                      <button class="btn btn-sm btn-fs rounded p-x-sm green">Edit</button>
                    </a>
                    <button type="button" class="btn btn-sm btn-fs rounded p-x-sm red" data-toggle="modal" data-target="#deleteModal{{ $mobil->id }}">
                        Delete
                    </button>   
                  </div>
                </div>
              </div>
            </div>        
          @endforeach                                                                                        
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModalMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            

        <form action="/mobil/store" method="POST" enctype="multipart/form-data">
            @csrf                             
            <div class="form-group">
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
                {{-- @error('no_plat')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror --}}
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
                <button type="submit" class="mr-auto p-2 bd-highlight float-right btn btn-sm btn-fw black">Tambah Brand</button>
                <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
              </div>            
        </form>

      </div>
    </div>
  </div>
</div>

<!-- EDIT MODAL -->
@foreach ($mobils as $mobil)
<div class="modal fade" id="editModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
          <form action="/mobil/{{ $mobil->id }}/update" method="POST" enctype="multipart/form-data">
              @method('patch')
              @csrf               
              <div class="form-group">
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
                  <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $mobil->no_plat }}">
              </div>
              <div class="form-group">
                  <label for="nama_mobil">Mobil</label>
                  <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value=" {{ $mobil->nama_mobil }}">
              </div>
              <div class="form-group">
                  <label for="max_minyak">Kapasitas Minyak</label>
                  <input type="number" class="form-control" id="max_minyak" name="max_minyak" value="{{ $mobil->max_minyak }}">
              </div>                
              <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto" value="{{ $mobil->foto }}">
              </div>                
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
          </form>                                          
      </div>
    </div>
  </div>
</div>
<!-- /EDIT MODAL -->

{{-- DELETE MODAL --}}
<form action="/mobil/{{ $mobil->id }}/delete" method="POST">
  @csrf
  @method('delete')   
  <div class="modal fade" id="deleteModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus mobil?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>                                            
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-sm btn-danger">Ya</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endforeach
{{-- /DELETE MODAL --}}

@stop