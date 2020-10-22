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
    <div class="row">
      <livewire:logs.card-mobil>
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

@endsection
