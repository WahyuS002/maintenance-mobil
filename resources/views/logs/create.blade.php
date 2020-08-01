{{-- @php
  $brands = App\Brand::get();    
@endphp --}}

@extends('layouts.app')

@section('content')
<div ui-view class="app-body" id="view">
  <div class="padding">
    <div class="margin">
      <div class="row d-flex align-items-center">
        <div class="col-md-0">
          <h5 class="mb-0 _300">Mobil</h5>
          <small class="text-muted">Klik salah satu mobil untuk menambahkan laporan</small>
        </div>
      </div>         
    </div>
    <div class="row">      
      <div class="col-md-9">
        <div class="row">
          @foreach ($mobils as $mobil)
            <div class="col-xs-6 col-sm-4 col-md-3">
               <div class="box p-a-xs">                
                  <a href="/log/{{ $mobil->id }}/store" data-toggle="modal" data-target="#tambahLogModal{{ $mobil->id }}">
                    <img src="{{ url('storage/'.$mobil->foto) }}" alt="" class="img-responsive fit-image">
                  </a>
                <div class="p-a-sm">
                  <div class="text-ellipsis">{{ $mobil->nama_mobil }}</div>
                  <span class="text-muted">{{ $mobil->brand->nama_brand }}</span>                                    
                </div>
              </div>
            </div>        
          @endforeach                                                                                        
        </div>
      </div>
    </div>
  </div>
</div>

@foreach ($mobils as $mobil)
<!-- TAMBAH LOG MODAL -->
<div class="modal fade" id="tambahLogModal{{ $mobil->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content box-shadow-md black lt m-b">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $mobil->nama_mobil }}<small class="text-sm text-muted"> ({{ $mobil->no_plat }})</small></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            

        <form action="/log/{{ $mobil->id }}/store" method="POST" id="form-create">
            @csrf                  
            <div class="error-form-create"></div>     
            {{-- <div class="form-group">
                <label for="nama_brand">Brand</label>
                <input type="text" class="form-control" id="nama_brand" name="nama_brand" value="{{ $mobil->brand->nama_brand }}" disabled>              
            </div> --}}            
            <div class="form-group">
                <label for="no_plat">Treatment</label>
                <input type="text" class="form-control" id="no_plat" name="no_plat" value="~ MASIH KOSONG ~" disabled>
            </div>               
            {{-- <div class="form-group">
                <label for="laporan">Laporan</label>
                <input type="text" class="form-control" id="laporan" name="laporan">
            </div> --}}
            <div class="form-group">
              <label for="laporan">Laporan</label>
              <textarea class="form-control" id="laporan" name="laporan" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="waktu">Waktu</label>
              <input type="date" class="form-control" id="waktu" name="waktu">
            </div>               
            <div class="form-group">
              <label for="biaya">Biaya</label>
              <input type="number" class="form-control quantity" id="biaya" name="biaya" min="1000" max="1000000" maxlength="7">
            </div>               
            <hr>            
              <div class="d-flex bd-highlight mb-3">
                <button type="button" class="btn btn-sm btn-secondary p-2 bd-highlight mr-2" data-dismiss="modal">Close</button>
                <button type="button" onclick="kirimData()" class="btn btn-sm btn-primary p-2 bd-highlight">Tambah</button>
              </div>            
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach

<script>
      var inputQuantity = [];
    $(function() {
      $(".quantity").each(function(i) {
        inputQuantity[i]=this.defaultValue;
         $(this).data("idx",i); // save this field's index to access later
      });
      $(".quantity").on("keyup", function (e) {
        var $field = $(this),
            val=this.value,
            $thisIndex=parseInt($field.data("idx"),10); // retrieve the index
//        window.console && console.log($field.is(":invalid"));
          //  $field.is(":invalid") is for Safari, it must be the last to not error in IE8
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            this.value = inputQuantity[$thisIndex];
            return;
        } 
        if (val.length > Number($field.attr("maxlength"))) {
          val=val.slice(0, 5);
          $field.val(val);
        }
        inputQuantity[$thisIndex]=val;
      });      
    });
</script>

@stop