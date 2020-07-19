{{-- @php
  $brands = App\Brand::get();    
@endphp --}}

@extends('layouts.app')

@section('content')
<div ui-view class="app-body" id="view">
  <div class="padding">
    <div class="margin">
      <div class="row d-flex align-items-center">
        <div class="col-md-0">
          <h5 class="mb-0 _300">Mobil</h5>
          <small class="text-muted">Klik salah satu mobil untuk menambahkan laporan</small>
        </div>
      </div>         
    </div>
    <div class="row">      
      <div class="col-md-9">
        <div class="row">
          @foreach ($mobils as $mobil)
            <div class="col-xs-6 col-sm-4 col-md-3">
               <div class="box p-a-xs">                
                  <a href="/log/{{ $mobil->id }}/store" data-toggle="modal" data-target="#tambahLogModal{{ $mobil->id }}">
                    <img src="{{ url('storage/'.$mobil->foto) }}" alt="" class="img-responsive fit-image">
                  </a>
                <div class="p-a-sm">
                  <div class="text-ellipsis">{{ $mobil->nama_mobil }}</div>
                  <span class="text-muted">{{ $mobil->brand->nama_brand }}</span>                                    
                </div>
              </div>
            </div>        
          @endforeach                                                                                        
        </div>
      </div>
    </div>
  </div>
</div>

@foreach ($mobils as $mobil)
<!-- TAMBAH LOG MODAL -->
<div class="modal fade" id="tambahLogModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            

        <form action="/log/{{ $mobil->id }}/store" method="POST" enctype="multipart/form-data">
            @csrf                       
            <div class="form-group">
                <label for="nama_brand">Brand</label>
                <input type="text" class="form-control" id="nama_brand" name="nama_brand" value="{{ $mobil->brand->nama_brand }}" disabled>
                {{-- @error('no_plat')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror --}}
            </div>
            <div class="form-group">
                <label for="nama_mobil">Mobil</label>
                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="{{ $mobil->nama_mobil }}" disabled>
            </div>
            <div class="form-group">
                <label for="no_plat">No Plat</label>
                <input type="text" class="form-control" id="no_plat" name="no_plat" value="{{ $mobil->no_plat }}" disabled>
            </div>
            <div class="form-group">
                <label for="no_plat">Treatment</label>
                <input type="text" class="form-control" id="no_plat" name="no_plat" value="~ MASIH KOSONG ~" disabled>
            </div>               
            <div class="form-group">
                <label for="laporan">Laporan</label>
                <input type="text" class="form-control" id="laporan" name="laporan">
            </div> 
            <div class="form-group">
              <label for="waktu">Waktu</label>
              <input type="date" class="form-control" id="waktu" name="waktu">
            </div>               
            <div class="form-group">
              <label for="biaya">Biaya</label>
              <input type="number" class="form-control" id="biaya" name="biaya">
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
@endforeach
    

@stop