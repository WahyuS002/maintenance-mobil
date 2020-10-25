@extends('layouts.app')

@section('content')
<div class="padding mt-5">
    <livewire:brand.brand-index>
</div>
@endsection

@push('script-after')

  <script>
      window.addEventListener('openCreateBrandModal', event => {
          $("#createBrandModal").modal('show');
      });
  </script>

  <script>
      window.addEventListener('closeCreateBrandModal', event => {
          $("#createBrandModal").modal('hide');
      });
  </script>

  <script>
    window.addEventListener('openEditBrandModal', event => {
        $("#editBrandModal").modal('show');
    });
  </script>

  <script>
    window.addEventListener('closeEditBrandModal', event => {
        $("#editBrandModal").modal('hide');
    });
  </script>

  <script>
    window.addEventListener('openDeleteBrandModal', event => {
        $("#deleteBrandModal").modal('show');
    });
  </script>

  <script>
    window.addEventListener('closeDeleteBrandModal', event => {
        $("#deleteBrandModal").modal('hide');
    });
  </script>

  <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('assets/myscript.js') }}"></script>
@endpush