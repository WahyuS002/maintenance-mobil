@extends('layouts.app')

@push('style-after')
<link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js" defer></script>
@endpush

@section('content')
<div class="padding mt-5">
  <livewire:treatment.treatment-index>
</div>
@endsection

@push('script-after')
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>

<script>
  $(document).ready(function() {
      $('#select2').select2();
  });

  window.addEventListener('openCreateTreatmentModal', event => {
      $("#createTreatmentModal").modal('show');
  });

  window.addEventListener('closeCreateTreatmentModal', event => {
    $("#createTreatmentModal").modal('hide');
  });

  window.addEventListener('openEditTreatmentModal', event => {
      $("#editTreatmentModal").modal('show');
  });

  window.addEventListener('closeEditTreatmentModal', event => {
    $("#editTreatmentModal").modal('hide');
  });

  window.addEventListener('openDeleteTreatmentModal', event => {
      $("#deleteTreatmentModal").modal('show');
  });

  window.addEventListener('closeDeleteTreatmentModal', event => {
    $("#deleteTreatmentModal").modal('hide');
  });
</script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/myscript.js') }}"></script>

@endpush