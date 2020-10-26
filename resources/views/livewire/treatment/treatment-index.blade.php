<div class="box mt-3">
    <div class="box-header">
        <div class="d-flex bd-highlight mb-3">
            <div class="mr-auto p-2 bd-highlight">
                <h2>Perawatan Mobil</h2>
                <small>Wrap the table in a div with .table-responsive class</small>
            </div>
            <div class="p-2 bd-highlight align-self-center">
                <a class="btn btn-sm btn-icon white" wire:click="openTambahModal">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered m-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mobil</th>
                    <th>Jenis Perawatan</th>
                    <th>Waktu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($treatments as $treatment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $treatment->mobil->nama_mobil }}</td>
                    <td>{{ $treatment->jenis }}</td>
                    <td>{{ $treatment->waktu }}</td>
                    <td>
                        <button class="btn btn-icon btn-rounded btn-success" wire:click="openEditModal({{ $treatment }})">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button class="btn btn-icon btn-rounded btn-danger" wire:click="openDeleteModal({{ $treatment }})">
                            <i class="fa  fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $treatments->links('pagination-links') }}
        </div>

    </div>

    <!-- START TAMBAH TREATMENT -->
    <div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="createTreatmentModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Perawatan Mobil</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" wire:submit.prevent="store">
                        @csrf
                        <div class="form-group">
                            <label for="dropdown">Mobil</label>
                            <div>
                                <select class="w-100 dropdown-menu pos-stc inline dark mb-3" wire:model="mobil_id">
                                    <option value="" disabled>Select</option>
                                    @foreach($mobils as $mobil)
                                    <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
                                    @endforeach
                                </select>
                                @error('mobil_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Perawatan</label>
                            <input type="text" class="form-control" id="jenis" wire:model="jenis">
                            @error('jenis')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="date" class="form-control" id="waktu" wire:model="waktu">
                            @error('waktu')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="d-flex bd-highlight mb-3">
                            <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END TAMBAH TREATMENT -->


    <!-- START EDIT TREATMENT -->
    <div class="modal fade" id="editTreatmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Treatment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" wire:submit.prevent="update({{ $treatment_id }})">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="dropdown">Mobil</label>
                            <div>
                                <select class="w-100 dropdown-menu pos-stc inline dark mb-3" wire:model="mobil_id">
                                    <option value="">Select</option>
                                    @foreach($mobils as $mobil)
                                    <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Perawatan</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" wire:model="jenis">
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="date" class="form-control" id="waktu" name="waktu" wire:model="waktu">
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
    <!-- END EDIT TREATMENT -->


    <!-- START DELETE TREATMENT -->
    <div class="modal fade" id="deleteTreatmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus perawatan mobil ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <form method="POST" wire:submit.prevent="destroy({{ $treatment_id }})">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-sm btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END DELETE TREATMENT -->


</div>

