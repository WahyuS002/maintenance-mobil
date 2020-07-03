@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tambah Data Driver</h1>

    <form action="/driver/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card" style="width: 28rem">
            <div class="card-header">Tambah Driver</div>

            <div class="card-body">
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
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </div>
    </form>

</div>
@endsection