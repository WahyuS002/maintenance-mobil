@extends('layouts.app')

@section('content')
<div class="padding mt-5">
<div class="box mt-3">
    <div class="box-header">
      <h2>Data Laporan</h2>
      <small>Lorem ipsum dolor sit amet consectetur.</small>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered m-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Mobil</th>
            <th>Nomor Plat</th>
            <th>Waktu</th>
            <th>Biaya</th>
            <th>Laporan</th>
        </thead>
        <tbody>
          @forelse ($laporan as $l)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $l->nama_mobil }}</td>
            <td>{{ $l->no_plat }}</td>
            <td>{{ $l->waktu }}</td>
            <td>{{ $l->biaya }}</td>
            <td>{{ $l->laporan }}</td>
          </tr>
          @empty
          <tbody>
            <tr>
              <td colspan="6" class="text-center alert-danger">Data Kosong !</td>
            </tr>
          </tbody>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection