@extends('layouts.app')

@section('content')
{{-- <div class="container">

    <div class="d-flex justify-content-between">
        <div>
            <h1 class="">Data Mobil</h1>
        </div>

        <div class="mb-3">
            <a href="mobil/create" class="btn btn-primary">Tambah Mobil</a>
        </div>
    </div>   

    <div class="row">
        @foreach ($mobils as $mobil)
            <div class="col-md-3 mb-4">
                <div class="card">                                       
                    <div>
                        <a href="/mobil/{{ $mobil->id }}/edit">
                            <img src="{{ url('storage/'.$mobil->foto) }}" alt="tidak ada gambar" class="card-img-top">                            
                        </a>
                    </div>                    
                    <div class="card-footer">                        
                        <div class="">
                            <strong>{{ $mobil->nama_mobil }}</strong>
                        </div>
                        <div class="">
                            <span>{{ $mobil->tipe_mobil }}</span>
                        </div>                      
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

<div class="content-wrapper">
    <!-- Page Title Header Starts-->
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header">
          <h4 class="page-title">Dashboard</h4>                  
        </div>
      </div>
      <div class="col-md-12">
        <div class="page-header-toolbar">                  
          <div class="sort-wrapper">
            <button type="button" class="btn btn-primary toolbar-item">New</button>                    
          </div>
        </div>
      </div>
    </div>     
    <div class="row">
        @foreach ($mobils as $mobil)
            <div class="col-md-3 mb-4">
                <div class="card">                                       
                    <div>
                        <a href="/mobil/{{ $mobil->id }}/edit">
                            <img src="{{ url('storage/'.$mobil->foto) }}" alt="tidak ada gambar" class="card-img-top"  style="height: 250px; width:100%;">                            
                        </a>
                    </div>                    
                    <div class="card-footer">                        
                        <div class="">
                            <strong>{{ $mobil->nama_mobil }}</strong>
                        </div>
                        <div class="">
                            <span>{{ $mobil->tipe_mobil }}</span>
                        </div>                      
                    </div>
                </div>
            </div>
        @endforeach
    </div>            
  </div>
@stop