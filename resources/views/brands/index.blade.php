@extends('layouts.app')

@section('content')
<div class="padding mt-5">
<div class="box mt-3">
    <div class="box-header">
      <h2>Responsive table</h2>
      <small>Wrap the table in a div with .table-responsive class</small>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered m-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Brand</th>
            <th>Action</th>            
        </thead>
        <tbody>
          @foreach ($brands as $brand)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $brand->nama_brand }}</td>
            <td>
              <button class="btn btn-icon btn-rounded btn-success" data-toggle="modal" data-target="#editModal{{ $brand->id }}">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-icon btn-rounded btn-danger" data-toggle="modal" data-target="#deleteModal{{ $brand->id }}"> 
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
@foreach ($brands as $brand)
<div class="modal fade" id="editModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
          <form action="/brand/{{ $brand->id }}/update" method="POST" enctype="multipart/form-data">
              @method('patch')
              @csrf                           
              <div class="form-group">
                  <label for="nama_brand">Nama Brand</label>
                  <input type="text" class="form-control" id="nama_brand" name="nama_brand" value="{{ $brand->nama_brand }}">
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
<form action="/brand/{{ $brand->id }}/delete" method="POST">
  @csrf
  @method('delete')   
  <div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus brand? ini juga akan menghapus mobil dengan brand tersebut</h5>
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