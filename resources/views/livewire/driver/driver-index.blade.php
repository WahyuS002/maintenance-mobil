<div class="padding">
    <div class="margin">
        <div class="row d-flex align-items-center">
            <div class="col-md-0">
                <h5 class="mb-0 _300">Drivers</h5>
            </div>
            <div class="col-md-0">
                <a class="btn btn-sm btn-icon white" wire:click="openTambahModal">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($drivers as $driver)
                <div class="mx-3">
                    <div class="box box-rounded box-user p-a-xs">
                        <a class="img-responsive fit-image" wire:click="openEditModal({{ $driver }})">
                            <img src="{{ asset('storage/' . $driver->foto) }}" class="img-responsive fit-image">
                        </a>
                        <div class="p-a-sm">
                            <div class="text-ellipsis">{{ $driver->nama }}</div>
                            <span class="text-muted">{{ $driver->nik }}</span>
                            <td class="text-center">
                                <div class="dropdown-more custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink10">
                                        <a class="dropdown-item" wire:click="openEditModal({{ $driver }})">Edit</a>
                                        <a class="dropdown-item" wire:click="openDeleteModal({{ $driver }})">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- START TAMBAH DRIVER -->
    <div class="modal fade" id="createDriverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" wire:submit.prevent="store">
                        @csrf
                        <div id="error-form-create"></div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" wire:model="nama">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control" wire:model="nik">
                            @error('nik')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" wire:model="foto">
                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END TAMBAH DRIVER -->


    <!-- START EDIT DRIVER -->
    <div class="modal fade" id="editDriverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" wire:submit.prevent="update({{ $driver_id }})">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" wire:model="nama">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control" wire:model="nik">
                            @error('nik')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" wire:model="foto">
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
    <!-- END EDIT DRIVER -->


    <!-- START DELETE DRIVER -->

    <div class="modal fade" id="deleteDriverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus <strong>{{ $nama }}</strong>?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <form method="POST" wire:submit.prevent="destroy({{ $driver_id }})">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-sm btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END DELETE DRIVER -->

</div>