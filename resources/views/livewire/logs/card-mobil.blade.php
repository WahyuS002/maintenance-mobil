<div class="col-md-12">
    <div class="row">
        @foreach ($mobils as $mobil)
        <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="box box-rounded p-a-xs">
                <a data-toggle="modal" data-target="#tambahLogModal" wire:click="tambahLogModal({{ $mobil->id }})">
                    <img src="{{ url('storage/'. $mobil->foto) }}" alt="" class="img-responsive fit-image">
                </a>
                <div class="p-a-sm">
                    <div class="d-flex justify-content-between">
                        <div class="text-ellipsis">{{ $mobil->nama_mobil }}</div>
                        <div class="text-muted">{{ $mobil->brand->nama_brand }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $mobils->links('pagination-links') }}
    </div>

    <!-- TAMBAH LOG MODAL -->
    <div wire:ignore.self class="modal fade" id="tambahLogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content box-shadow-md black lt m-b">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $nama_mobil }}<small class="text-sm text-muted"> ({{ $no_plat_mobil }})</small></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" wire:submit.prevent="tambahLog({{ $id_mobil }})">
                        @csrf
                        <div class="form-group">
                            <label for="no_plat">Treatment</label>
                            <input type="text" class="form-control" id="no_plat" name="no_plat" value="~ MASIH KOSONG ~" disabled>
                        </div>
                        <div class="form-group">
                            <label for="laporan">Laporan</label>
                            <textarea class="form-control" id="laporan" name="laporan" rows="2" wire:model="laporan"></textarea>
                            @error('laporan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="date" class="form-control" id="waktu" name="waktu" wire:model="waktu">
                            @error('waktu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input type="number" class="form-control quantity" id="biaya" name="biaya" min="1000" max="1000000" maxlength="7" wire:model="biaya">
                            @error('biaya')
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
</div>