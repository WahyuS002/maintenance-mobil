@extends('layouts.app')

@section('content')
<div class="padding mt-5">
    <div class="box mt-3">
        <div class="box-header">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <h2>Perawatan Mobil</h2>
                    <small>Wrap the table in a div with .table-responsive class</small>            
                </div>                
                <div class="p-2 bd-highlight align-self-center">
                  <a class="btn btn-sm btn-icon white" data-remote="{{ route('treatment.create') }}" data-toggle="modal" data-target="#mymodal">
                        <i class="fa fa-plus"></i>
                    </a>                      
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered m-0">
            <thead>
                <tr>
                <th>#</th>
                <th>Mobil</th>
                <th>Jenis Perawatan</th>
                <th>Waktu</th>
                <th>Action</th>            
            </thead>
            <tbody>
                @foreach ($treatments as $treatment)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $treatment->mobil->nama_mobil }}</td>
                <td>{{ $treatment->jenis }}</td>
                <td>{{ $treatment->waktu }}</td>
                <td>
                    <button class="btn btn-icon btn-rounded btn-success" data-toggle="modal" data-target="#editModal{{ $treatment->id }}">
                    <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-icon btn-rounded btn-danger" data-toggle="modal" data-target="#deleteModal{{ $treatment->id }}"> 
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
@foreach ($treatments as $treatment)
<div class="modal fade" id="editModal{{ $treatment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Treatment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
          <form action="/treatment/{{ $treatment->id }}/update" method="POST" enctype="multipart/form-data">
              @method('patch')
              @csrf               
              <div class="form-group">
                <label for="dropdown">Mobil</label>        
                <div>
                  <select class="w-100 dropdown-menu pos-stc inline dark mb-3" name="mobil_id">
                    <option value="">Select</option>
                    @foreach($mobils as $mobil)
                      <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
                    @endforeach
                  </select>
                </div>
              </div>                
              <div class="form-group">
                <label for="jenis">Jenis Perawatan</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $treatment->jenis }}">                  
              </div>
              <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="date" class="form-control" id="waktu" name="waktu" value="{{ $treatment->waktu }}">
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
<form action="/treatment/{{ $treatment->id }}/delete" method="POST">
  @csrf
  @method('delete')   
  <div class="modal fade" id="deleteModal{{ $treatment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus perawatan mobil ini?</h5>
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