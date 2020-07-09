@extends('layouts.app')

@section('content')

<div ui-view class="app-body" id="view">
  <div class="padding">
    <div class="margin">
      <div class="row d-flex align-items-center">
        <div class="col-md-0">
          <h5 class="mb-0 _300">Drivers</h5>
        </div>
        <div class="col-md-0">
          <a class="btn btn-sm btn-icon white" data-toggle="modal" data-target="#tambahModal">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          @foreach ($drivers as $driver)
            <div class="col-xs-6 col-sm-4 col-md-3">
              <div class="box p-a-xs">
                <a href="/driver/{{ $driver->id }}/edit" data-toggle="modal" data-target="#editModal{{ $driver->id }}"><img src="{{ url('storage/'.$driver->foto) }}" alt="" class="img-responsive fit-image"></a>
                <div class="p-a-sm">
                  <div class="text-ellipsis">{{ $driver->nama }}</div>
                  <span class="text-muted">{{ $driver->nik }}</span>
                  <div>
                    <a href="/driver/{{ $driver->id }}/edit" data-toggle="modal" data-target="#editModal{{ $driver->id }}">
                      {{-- <button class="btn btn-success btn-sm mr-3 rounded-m5">Edit</button> --}}
                      <button class="btn btn-sm btn-fs rounded p-x-sm green">Edit</button>
                    </a>
                    <button type="button" class="btn btn-sm btn-fs rounded p-x-sm red" data-toggle="modal" data-target="#deleteModal{{ $driver->id }}">
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
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Driver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            

          <form action="/driver/store" method="POST" enctype="multipart/form-data">
              @csrf               
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" id="nik" name="nik">
              </div>
              <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto">
              </div>                
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
@foreach ($drivers as $driver)
<div class="modal fade" id="editModal{{ $driver->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Driver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
          <form action="/driver/{{ $driver->id }}/update" method="POST" enctype="multipart/form-data">
              @method('patch')
              @csrf               
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{ $driver->nama }}">
              </div>
              <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" id="nik" name="nik" value="{{ $driver->nik }}">
              </div>
              <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto">
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

{{-- DELETE MODAL --}}

<!-- Modal -->
<form action="/driver/{{ $driver->id }}/delete" method="POST">
  @csrf
  @method('delete')   
  <div class="modal fade" id="deleteModal{{ $driver->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus driver?</h5>
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
  
@endsection