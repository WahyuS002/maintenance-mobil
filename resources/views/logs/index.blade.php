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
          @forelse ($drivers->mobils as $driver)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $driver->nama_mobil }}</td>
            <td>{{ $driver->no_plat }}</td>
            <td>{{ $driver->pivot->waktu }}</td>
            <td>{{ $driver->pivot->biaya }}</td>
            <td>{{ $driver->pivot->laporan }}</td>
            <td>
              {{-- <button class="btn btn-icon btn-rounded btn-success" data-toggle="modal" data-target="#editModal{{ $driver->pivot->id }}">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-icon btn-rounded btn-danger" data-toggle="modal" data-target="#deleteModal{{ $driver->pivot->id }}">
                <i class="fa  fa-trash"></i>
              </button> --}}
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center badge-danger">Data Kosong</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection