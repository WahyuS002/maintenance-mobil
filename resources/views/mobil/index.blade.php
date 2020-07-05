@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">Mobil</h4>                  
        </div>
      </div>
      <div class="col-md-12">
        <div class="page-header-toolbar">                  
          <div class="ml-auto">
            <button type="button" class="btn btn-primary toolbar-item p-3" data-toggle="modal" data-target="#tambahModal">Tambah Mobil</button>                    
          </div>
        </div>
      </div>
    </div>     
    <div class="row">
        @foreach ($mobils as $mobil)
            <div class="col-md-3 mb-4">
                <div class="card rounded-m5">                                       
                    <div>
                        <a href="/mobil/{{ $mobil->id }}/edit" data-toggle="modal" data-target="#editModal{{ $mobil->id }}">
                            <img src="{{ url('storage/'.$mobil->foto) }}" alt="tidak ada gambar" class="card-img-top p-3"  style="height: 200px; width: 100%;">                            
                        </a>
                    </div>                    
                    <div class="card-footer">                        
                        <div class="">
                            <strong>{{ $mobil->nama_mobil }}</strong>
                        </div>
                        <div class="">
                            <span>{{ $mobil->brand->nama_brand }}</span>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="/mobil/{{ $mobil->id }}/edit" data-toggle="modal" data-target="#editModal{{ $mobil->id }}">
                                <button class="btn btn-success btn-sm mr-3 rounded-m5 custom-button">Edit</button>  
                            </a>
                            <button type="button" class="btn btn-danger btn-sm rounded-m5 custom-button" data-toggle="modal" data-target="#deleteModal{{ $mobil->id }}">
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mobil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">            

            <form action="/mobil/store" method="POST" enctype="multipart/form-data">
                @csrf               
                <div class="form-group">
                    <label for="brand_id">Brand</label>
                    <input type="text" class="form-control" id="brand_id" name="brand_id">
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
                    <input type="text" class="form-control" id="max_minyak" name="max_minyak">
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
  @foreach ($mobils as $mobil)
  <div class="modal fade" id="editModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
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
                    <label for="no_plat">Nomor Plat</label>
                    <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $mobil->no_plat }}">
                </div>
                <div class="form-group">
                    <label for="nama_mobil">Mobil</label>
                    <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value=" {{ $mobil->nama_mobil }}">
                </div>
                <div class="form-group">
                    <label for="tipe_mobil">Brand</label>
                    <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil" value="{{ $mobil->tipe_mobil }}">
                </div>                
                <div class="form-group">
                    <label for="max_minyak">Kapasitas Minyak</label>
                    <input type="text" class="form-control" id="max_minyak" name="max_minyak" value="{{ $mobil->max_minyak }}">
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
  
  {{-- DELETE MODAL --}}
  
  <!-- Modal -->
  <form action="/mobil/{{ $mobil->id }}/delete" method="POST">
    @csrf
    @method('delete')   
    <div class="modal fade" id="deleteModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
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

@stop