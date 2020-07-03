@extends('layouts.app')

@section('content')
<div class="container">    
    <form action="/driver/{{ $driver->id }}/update" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="card" style="width: 28rem">
            <div class="card-header">Edit Driver</div>
            <div class="card-body">
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
                    <input type="file" class="form-control" id="foto" name="foto" value="{{ $driver->foto }}">
                </div>
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </div>
    </form>
    <div>
        <form action="/driver/{{ $driver->id }}/delete" method="POST">
            @csrf
            @method('delete')
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link text-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                Delete
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>

</div>
@endsection