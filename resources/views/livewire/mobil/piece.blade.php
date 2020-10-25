<div class="padding">

  <div class="margin">

    <div class="row d-flex align-items-center">
      <div class="col-md-0">
        <h5 class="mb-0 _300">Mobil</h5>
      </div>
      <div class="col-md-0">
        <a class="btn btn-sm btn-icon white" style="cursor: pointer;" wire:click="openTambahModal">
          <i class="fa fa-plus"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="row">
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
                      <a class="dropdown-item" wire:click="openEditModal({{ $mobil }})">Edit</a>
                      <a class="dropdown-item" wire:click="openDeleteModal({{ $mobil }})">Delete</a>
                    </div>
                  </div>
                </td>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center">
        {{ $mobils->links('pagination-links') }}
      </div>
    </div>
  </div>

  <!-- START TAMBAH MOBIL -->
  <div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="createMobilModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Mobil</h5>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" wire:submit.prevent="store">
            @csrf
            <div class="form-group">
              {{-- <div id="error-form-create"></div> --}}
              <label for="dropdown">Brand Mobil</label>
              <div>
                <select class="w-100 dropdown-menu pos-stc inline dark mb-3" wire:model="brand_id">
                  <option value="" disabled>Select</option>
                  @foreach($brands as $brand)
                  <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
                  @endforeach
                </select>
              </div>
              @error('brand_id')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_plat">Nomor Plat</label>
              <input type="text" class="form-control" id="no_plat" wire:model="no_plat">
              @error('no_plat')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_mobil">Mobil</label>
              <input type="text" class="form-control" id="nama_mobil" wire:model="nama_mobil">
              @error('nama_mobil')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="max_minyak">Kapasitas Minyak</label>
              <input type="number" class="form-control" id="max_minyak" wire:model="max_minyak">
              @error('max_minyak')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" class="form-control" id="foto" wire:model="foto">
              @error('foto')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <hr>
            <div class="d-flex bd-highlight mb-3">
              <a href="{{ route('brand') }}" class="mr-auto p-2 bd-highlight float-right btn btn-sm btn-fw black">Tambah Brand</a>
              <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END TAMBAH MOBIL -->


  <!-- EDIT MODAL -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Mobil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data" wire:submit.prevent="update({{ $id_mobil }})">
            @method('patch')
            @csrf
            <div class="form-group">
              <label for="dropdown">Brand Mobil</label>
              <div>
                <select class="w-100 dropdown-menu pos-stc inline dark mb-3" wire:model="brand_id">
                  <option value="" disabled>Select</option>
                  @foreach($brands as $brand)
                  <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
                  @endforeach
                </select>
                @error('brand_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="no_plat">Nomor Plat</label>
              <input type="text" class="form-control" id="no_plat" wire:model="no_plat">
              @error('no_plat')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_mobil">Mobil</label>
              <input type="text" class="form-control" id="nama_mobil" wire:model="nama_mobil">
              @error('nama_mobil')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="max_minyak">Kapasitas Minyak</label>
              <input type="number" class="form-control" id="max_minyak" wire:model="max_minyak">
              @error('max_minyak')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" class="form-control" id="foto" wire:model="foto">
              @error('foto')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END EDIT MODAL -->


  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
      <div class="modal-content box-shadow-md black lt m-b">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus mobil <strong>{{ $nama_mobil }}</strong> ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <form method="POST" wire:submit.prevent="destroy({{ $id_mobil }})">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-sm btn-danger">Ya</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END DELETE MODAL -->

</div>
