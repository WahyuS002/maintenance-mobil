@extends('layouts.app')

@push('style-after')
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
@endpush

@section('content')
<div ui-view class="app-body" id="view">
  <livewire:mobil.piece :brands="$brands">
</div>
@stop

@push('script-after')

<script>
  window.addEventListener('openCreateMobilModal', event => {
      $("#createMobilModal").modal('show');
  });

  window.addEventListener('closeCreateMobilModal', event => {
    $("#createMobilModal").modal('hide');
  });

  window.addEventListener('openEditMobilModal', event => {
      $("#editModal").modal('show');
  });

  window.addEventListener('closeEditMobilModal', event => {
      $("#editModal").modal('hide');
  });

  window.addEventListener('openDeleteMobilModal', event => {
      $("#deleteModal").modal('show');
  });

  window.addEventListener('closeDeleteMobilModal', event => {
      $("#deleteModal").modal('hide');
  });
</script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/myscript.js') }}"></script>
@endpush