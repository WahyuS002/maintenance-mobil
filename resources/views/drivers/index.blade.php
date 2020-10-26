@extends('layouts.app')

@push('style-after')
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
@endpush

@section('content')

<div ui-view class="app-body" id="view">
  <livewire:driver.driver-index>
</div>

@endsection

@push('script-after')
<script>
  window.addEventListener('openCreateDriverModal', event => {
      $("#createDriverModal").modal('show');
  });

  window.addEventListener('closeCreateDriverModal', event => {
    $("#createDriverModal").modal('hide');
  });

  window.addEventListener('openEditDriverModal', event => {
      $("#editDriverModal").modal('show');
  });

  window.addEventListener('closeEditDriverModal', event => {
    $("#editDriverModal").modal('hide');
  });

  window.addEventListener('openDeleteDriverModal', event => {
      $("#deleteDriverModal").modal('show');
  });

  window.addEventListener('closeDeleteDriverModal', event => {
    $("#deleteDriverModal").modal('hide');
  });
</script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/myscript.js') }}"></script>
@endpush