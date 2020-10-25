@extends('layouts.app')

@section('content')
<div class="padding mt-5">
  <livewire:treatment.treatment-index>
</div>
@endsection

@push('script-after')

<script>
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