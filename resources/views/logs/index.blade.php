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
          <tr>
            <td>1</td>
            <td>q</td>
            <td>
              <button class="btn btn-icon btn-rounded btn-success" data-toggle="modal" data-target="#editModal">
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-icon btn-rounded btn-danger" data-toggle="modal" data-target="#deleteModal"> 
                <i class="fa  fa-trash"></i>
              </button>
            </td>                            
          </tr>                   
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection