@extends('layouts.app')

@push('style-after')
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
@endpush

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
    <div class="row" id="live-search">
      @include('logs.card')
    </div>
  </div>
</div>

@foreach ($mobils as $mobil)
<!-- TAMBAH LOG MODAL -->
<div class="modal fade" id="tambahLogModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $mobil->nama_mobil }}<small class="text-sm text-muted"> ({{ $mobil->no_plat }})</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="/log/{{ $mobil->id }}/store" method="POST" id="form-create">
            @csrf
            <div class="form-group">
                <label for="no_plat">Treatment</label>
                <input type="text" class="form-control" id="no_plat" name="no_plat" value="~ MASIH KOSONG ~" disabled>
            </div>
            <div class="form-group">
              <label for="laporan">Laporan</label>
              <textarea class="form-control" id="laporan" name="laporan" rows="2"></textarea>
              <div class="text-danger mt-2" id="error-laporan"></div>
            </div>
            <div class="form-group">
              <label for="waktu">Waktu</label>
              <input type="date" class="form-control" id="waktu" name="waktu">
              <div class="text-danger mt-2" id="error-waktu"></div>
            </div>
            <div class="form-group">
              <label for="biaya">Biaya</label>
              <input type="number" class="form-control quantity" id="biaya" name="biaya" min="1000" max="1000000" maxlength="7">
              <div class="text-danger mt-2" id="error-biaya"></div>
            </div>
            <hr>
              <div class="d-flex bd-highlight mb-3">
                <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
                <button type="button" onclick="kirimData()" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
              </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach
@stop

@section('js')

  <script>
    function kirimData(){
      $("#error-laporan").html('')
      $("#error-waktu").html('')
      $("#error-biaya").html('')
      $("#form-create").ajaxSubmit({
      success:function(res){
          window.location.reload()
      },
      error:function(e1,e2){
          let laporan = e1.responseJSON.errors.laporan;
          let biaya = e1.responseJSON.errors.biaya;
          let waktu = e1.responseJSON.errors.waktu;
          $("#error-laporan").append(laporan)
          $("#error-waktu").append(waktu)
          $("#error-biaya").append(biaya)
      }
      })
    }
  </script>

@endsection
