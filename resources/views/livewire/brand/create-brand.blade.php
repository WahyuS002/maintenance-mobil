<div class="box mt-3">
    <div class="box-header">
        <div class="d-flex bd-highlight mb-3">
            <div class="mr-auto p-2">
                <h2>Brand</h2>
            </div>
            <div class="align-self-center">
                <a class="btn btn-sm btn-icon white" wire:click="openModal">
                    <i class="fa fa-plus"></i>
                </a>
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
                    <button class="btn btn-icon btn-rounded btn-success" data-toggle="modal" data-target="#editModal{{ $brand->id }}" style="cursor: pointer;">
                        <i class="fa fa-pencil"></i>
                    </button>
                    <button class="btn btn-icon btn-rounded btn-danger" data-toggle="modal" data-target="#deleteModal{{ $brand->id }}" style="cursor: pointer;">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <ul class="pagination">
        <li class="disabled">
            <a href aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="active">
            <a href>1 <span class="sr-only">(current)</span></a>
        </li>
        <li><a href>2</a></li>
        <li><a href>3</a></li>
        <li><a href>4</a></li>
        <li><a href>5</a></li>
        <li>
            <a href aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul> --}}

    <div class="d-flex justify-content-center">
        {{ $brands->links('pagination-links') }}
    </div>

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
                    <button class="btn white" wire:click="closeModal">Cancel</button>
                    <button class="btn primary" wire:click="store">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>