<div class="box mt-3">
    <div class="box-header">
        <div class="d-flex justify-content-between bd-highlight mb-3">

            <div class="d-flex">
                <div class="p-2 mr-3">
                    <h2 class="align-middle mt-1">Brand</h2>
                </div>
                <div class="align-self-center">
                    <a class="btn btn-sm btn-icon white" wire:click="openTambahModal">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="align-self-center input">
                <input type="text" class="form-control" placeholder="Cari Brand..." wire:model="search">
                <span class="fa fa-search"></span>
            </div>

        </div>
    </div>
    <table st-table="rowCollectionBasic" class="table table-striped b-t">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Brand</th>
                <th>Jumlah Mobil</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr ng-repeat="row in rowCollectionBasic" st-select-row="row">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $brand->nama_brand }}</td>
                <td>{{ $brand->mobils->count() }}</td>
                <td>
                    <button class="btn btn-icon btn-rounded btn-success" style="cursor: pointer;" wire:click="openEditModal({{ $brand }})">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-icon btn-rounded btn-danger" style="cursor: pointer;" wire:click="openDeleteModal({{ $brand }})">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $brands->links('pagination-links') }}
    </div>

    <!-- START TAMBAH BRAND MOBIL -->
    <div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="createBrandModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Brand Mobil</h5>
                </div>
                <div class="modal-body">
                    <label for="nama_brand">Nama Brand</label>
                    <input type="text" class="form-control" wire:model="nama_brand">
                    @error('nama_brand') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="modal-footer">
                    <button class="btn white" wire:click="closeTambahModal">Cancel</button>
                    <button class="btn primary" wire:click="store">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END TAMBAH BRAND MOBIL -->


    <!-- START EDIT BRAND MOBIL -->
    <div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" wire:submit.prevent="update({{ $id_brand }})">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="nama_brand">Nama Brand</label>
                            <input type="text" class="form-control" id="nama_brand" wire:model="nama_brand">
                            @error('nama_brand') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="modal-footer">
                            <button class="btn white" wire:click="closeEditModal">Cancel</button>
                            <button class="btn primary" type="submit">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END EDIT BRAND MOBIL -->


    <!-- START DELETE BRAND MOBIL -->
    <div class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Brand - <strong>{{ $nama_brand }}</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus brand ini? Mobil dengan nama brand <strong>{{ $nama_brand }}</strong> juga akan terhapus</h5>
                </div>
                <form method="POST" wire:submit.prevent="destroy({{ $id_brand }})">
                    @csrf
                    @method('delete')
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-sm btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END DELETE BRAND MOBIL -->

</div>