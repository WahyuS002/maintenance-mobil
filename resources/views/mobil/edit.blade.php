@extends('layouts.app')

@section('content')
<div class="container">    
    <form action="/mobil/{{ $mobil->id }}/update" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="card" style="width: 28rem">
            <div class="card-header">Edit Mobil</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="no_plat">Nomor Plat</label>
                    <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $mobil->no_plat }}">
                </div>
                <div class="form-group">
                    <label for="nama_mobil">Nama Mobil</label>
                    <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ $mobil->nama_mobil }}">
                </div>
                <div class="form-group">
                    <label for="tipe_mobil">Tipe</label>
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
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </div>
    </form>
    <div>
        <form action="/mobil/{{ $mobil->id }}/delete" method="POST">
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
    </div>

</div>
@endsection