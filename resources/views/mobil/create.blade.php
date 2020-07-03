@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tambah Data mobil</h1>

    <form action="/mobil/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card" style="width: 28rem">
            <div class="card-header">Tambah Mobil</div>

            <div class="card-body">
                <div class="form-group">
                    <label for="no_plat">Nomor Plat</label>
                    <input type="text" class="form-control" id="no_plat" name="no_plat">
                </div>
                <div class="form-group">
                    <label for="nama_mobil">Nama Mobil</label>
                    <input type="text" class="form-control" id="nama_mobil" name="nama_mobil">
                </div>
                <div class="form-group">
                    <label for="tipe_mobil">Tipe</label>
                    <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil">
                </div>
                <div class="form-group">
                    <label for="max_minyak">Kapasitas Minyak</label>
                    <input type="text" class="form-control" id="max_minyak" name="max_minyak">
                </div>
                <div class="form-group">
                    <label for="foto">Foto Mobil</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </div>
    </form>

</div>
@endsection