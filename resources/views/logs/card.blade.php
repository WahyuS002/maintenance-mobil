<div class="col-md-12">
    <div class="row">
      @foreach ($mobils as $mobil)
        <div class="col-xs-6 col-sm-4 col-md-3">
           <div class="box box-rounded p-a-xs">
              <a href="/log/{{ $mobil->id }}/store" data-toggle="modal" data-target="#tambahLogModal{{ $mobil->id }}">
                <img src="{{ url('storage/'.$mobil->foto) }}" alt="" class="img-responsive fit-image">
              </a>
            <div class="p-a-sm">
              <div class="d-flex justify-content-between">
                <div class="text-ellipsis">{{ $mobil->nama_mobil }}</div>
                <span class="text-muted">{{ $mobil->brand->nama_brand }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>