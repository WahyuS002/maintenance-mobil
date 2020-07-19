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
            <th>Action</th>            
        </thead>
        <tbody>                    
          @foreach ($drivers->mobils as $driver)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $driver->nama_mobil }}</td>
            <td>{{ $driver->no_plat }}</td>
            <td>{{ $driver->pivot->waktu }}</td>
            <td>{{ $driver->pivot->biaya }}</td>
            <td>{{ $driver->pivot->laporan }}</td>                      
            <td>
              <button class="btn btn-icon btn-rounded btn-success" data-toggle="modal" data-target="#editModal{{ $driver->pivot->id }}">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-icon btn-rounded btn-danger" data-toggle="modal" data-target="#deleteModal{{ $driver->pivot->id }}"> 
                <i class="fa  fa-trash"></i>
              </button>
            </td>                            
          </tr>             
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- EDIT MODAL -->
@foreach ($drivers->mobils as $driver)
<div class="modal fade" id="editModal{{ $driver->pivot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
          <form action="/log/{{ $driver->pivot->id }}/update" method="POST">
              @method('patch')
              @csrf
              <input type="hidden" id="id" name="id" value="{{ $driver->pivot->id }}">  
              <input type="hidden" id="mobil_id" name="mobil_id" value="{{ $driver->pivot->mobil_id }}">  
              <div class="form-group">
                  <label for="laporan">Laporan</label>
                  <input type="text" class="form-control" id="laporan" name="laporan" value="{{ $driver->pivot->laporan }}">
              </div>                             
              <div class="form-group">
                  <label for="waktu">Waktu</label>
                  <input type="date" class="form-control" id="waktu" name="waktu" value="{{ $driver->pivot->waktu }}">
              </div>                             
              <div class="form-group">
                  <label for="biaya">Biaya</label>
                  <input type="number" class="form-control" id="biaya" name="biaya" value="{{ $driver->pivot->biaya }}">
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
<form action="/log/{{ $driver->pivot->id }}/delete" method="POST">
  @csrf
  @method('delete')   
  <div class="modal fade" id="deleteModal{{ $driver->pivot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus laporan?</h5>
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


@endsection