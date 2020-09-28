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
      {{-- @include('logs.card') --}}
      <livewire:logs.card :mobils="$mobils">
    </div>
  </div>
</div>
@stop

@section('js')

<script>
  window.addEventListener('logCreated', event => {
     $("#tambahLogModal").modal('hide');
})
</script>

<script>
  // function kirimData(){
    //   $("#error-laporan").html('')
    //   $("#error-waktu").html('')
    //   $("#error-biaya").html('')
    //   $("#form-create").ajaxSubmit({
      //   success:function(res){
        // window.location.reload()
        //         window.location = '{{ url("log/") }}'
        //     },
        //     error:function(e1,e2){
          //         let laporan = e1.responseJSON.errors.laporan;
          //         let biaya = e1.responseJSON.errors.biaya;
          //         let waktu = e1.responseJSON.errors.waktu;
          //         $("#error-laporan").append(laporan)
          //         $("#error-waktu").append(waktu)
          //         $("#error-biaya").append(biaya)
          //     }
          //     })
          //   }
          // </script>

          @endsection
