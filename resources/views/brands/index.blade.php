@extends('layouts.app')

@section('content')
<div class="padding mt-5">
  <div class="box mt-3">
    <div class="box-header">
      <div class="d-flex bd-highlight mb-3">
        <div class="mr-auto p-2">
          <h2>Brand</h2>
        </div>
        <div class="align-self-center">
          <a class="btn btn-sm btn-icon white" data-toggle="modal" data-target="#tambahModal">
              <i class="fa fa-plus"></i>
          </a>                      
      </div>
    </div>
    </div>  
    <table st-table="rowCollectionBasic" class="table table-striped b-t">
      <thead>
      <tr>
        <th>#</th>
        <th>Nama Brand</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($brands as $brand)
        <tr ng-repeat="row in rowCollectionBasic" st-select-row="row">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $brand->nama_brand }}</td>
          <td>
            <button class="btn btn-icon btn-rounded btn-success" data-toggle="modal" data-target="#editModal{{ $brand->id }}">
            <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-icon btn-rounded btn-danger" data-toggle="modal" data-target="#deleteModal{{ $brand->id }}"> 
            <i class="fa fa-trash"></i>
            </button>
          </td> 
        </tr>
        @endforeach      
      </tbody>
    </table>
  </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Brand Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            

        <form action="/brand/store" method="POST">
            @csrf                  
            <div class="form-group">
                <label for="nama_brand">Nama Brand</label>
                <input type="text" class="form-control" id="nama_brand" name="nama_brand">                  
            </div>                           
            <hr>            
              <div class="d-flex bd-highlight mb-3">
                <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
              </div>            
        </form>

      </div>
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