<div class="col-md-12">
  <div class="row">
    @foreach ($mobils as $mobil)
    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="box box-rounded p-a-xs">
        <img src="{{ url('storage/'. $mobil->foto) }}" alt="" class="img-responsive fit-image">
        <div class="p-a-sm">
          <div class="d-flex justify-content-between">
            <div class="text-ellipsis">{{ $mobil->nama_mobil }}</div>
            <div class="text-muted">{{ $mobil->brand->nama_brand }}</div>
            <td class="text-center">
              <div class="dropdown-more custom-dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink10">
                  <a class="dropdown-item" data-toggle="modal" data-target="#editModal{{ $mobil->id }}">Edit</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{ $mobil->id }}">Delete</a>
                </div>
              </div>
            </td>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>