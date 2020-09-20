{{ $brand_id }}
@foreach ($mobils as $mobil)
<div class="col-xs-6 col-sm-4 col-md-3">
    <div class="box p-a-xs">
        <a href="/mobil/{{ $mobil->id }}/edit" data-toggle="modal" data-target="#editModal{{ $mobil->id }}"><img src="{{ url('storage/'.$mobil->foto) }}" alt="" class="img-responsive fit-image"></a>
        <div class="p-a-sm">
            <div class="text-ellipsis">{{ $mobil->nama_mobil }}</div>
            <span class="text-muted">{{ $mobil->brand->nama_brand }}</span>
            <div class="mt-2">
                <a href="/mobil/{{ $mobil->id }}/edit" data-toggle="modal" data-target="#editModal{{ $mobil->id }}">
                    <button class="btn btn-sm btn-fs rounded p-x-sm green">Edit</button>
                </a>
                <button type="button" class="btn btn-sm btn-fs rounded p-x-sm red" data-toggle="modal" data-target="#deleteModal{{ $mobil->id }}">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach