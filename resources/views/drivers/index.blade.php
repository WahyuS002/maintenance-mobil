@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">Driver</h4>                  
        </div>
      </div>
      <div class="col-md-12">
        <div class="page-header-toolbar">                  
          <div class="ml-auto">
            <button type="button" class="btn btn-primary toolbar-item p-3" data-toggle="modal" data-target="#tambahModal">Tambah Driver</button>                    
          </div>
        </div>
      </div>
    </div>     
    <div class="row">
        @foreach ($drivers as $driver)
        <div class="col-md-3 mb-4">
            <div class="card rounded-m5">                                       
                <div>
                <a href="/driver/{{ $driver->id }}/edit" data-toggle="modal" data-target="#editModal{{ $driver->id }}">
                        <img src="{{ url('storage/'.$driver->foto) }}" alt="tidak ada gambar" class="card-img-top p-3" style="height: 200px; width: 100%;">                            
                    </a>
                </div>                    
                <div class="card-footer">                        
                    <div class="">
                        <strong>{{ $driver->nama }}</strong>
                    </div>
                    <div class="">
                        <span>{{ $driver->nik }}</span>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                      <a href="/driver/{{ $driver->id }}/edit" data-toggle="modal" data-target="#editModal{{ $driver->id }}">
                        <button class="btn btn-success btn-sm mr-3 rounded-m5 custom-button">Edit</button>  
                      </a>                                                 
                      <button type="button" class="btn btn-danger btn-sm rounded-m5 custom-button" data-toggle="modal" data-target="#deleteModal{{ $driver->id }}">
                        Delete
                    </button>                                         
                    </div>                      
                </div>
            </div>
        </div>
    @endforeach  
    </div>            
  </div>
  
  <!-- Tambah Modal -->
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
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
      <div class="modal-content">
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
        <div class="modal-content">
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