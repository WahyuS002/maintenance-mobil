@extends('layouts.app')

@section('content')
<!-- ############ PAGE START-->
<div class="padding mt-5">

	<div id="flash-data" data-user="{{ session()->get('success') }}"></div>

	<div class="row mt-3">
		<div class="col-xs-12 col-sm-4">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	            <span class="w-48 rounded  accent">
	              <i class="material-icons">&#xe151;</i>
	            </span>
	          </div>
	          <div class="clear">
	            <div class="text-muted">Mobil</div>
				<h4 class="m-0 text-md _600"><a href>{{ $mobil_count }}</a></h4>
	          </div>
	        </div>
	    </div>
	    <div class="col-xs-6 col-sm-4">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	            <span class="w-48 rounded primary">
	              <i class="material-icons">&#xe54f;</i>
	            </span>
	          </div>
	          <div class="clear">
	            <div class="text-muted">Driver</div>
				<h4 class="m-0 text-md _600"><a href>{{ $driver_count }}</a></h4>
	          </div>
	        </div>
	    </div>
	    <div class="col-xs-6 col-sm-4">
	        <div class="box p-a">
	          <div class="pull-left m-r">
	            <span class="w-48 rounded warn">
	              <i class="material-icons">&#xe8d3;</i>
	            </span>
	          </div>
	          <div class="clear">
	            <div class="text-muted">Treatment</div>
				<h4 class="m-0 text-md _600"><a href>{{ $log_count }}</a></h4>
	          </div>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-sm-6 col-md-4">
	        <div class="box">
	            <div class="box-header">
				  <h3>Mobil</h3>
	            </div>
	            <ul class="list no-border p-b">
					@foreach ($mobils as $mobil)
					<li class="list-item">
						<a herf class="list-left">
							<span class="w-40 avatar-circle">
							  <img src="{{ url('storage/'. $mobil->foto) }}" alt="...">
							  <i class="on b-white bottom"></i>
							</span>
						</a>
						<div class="list-body">
						  <div><a href>{{ $mobil->nama_mobil }}</a></div>
						  <small class="text-muted text-ellipsis">{{ $mobil->brand->nama_brand }}</small>
						</div>
					  </li>
					@endforeach
	            </ul>
	        </div>
	    </div>
	    <div class="col-sm-6 col-md-4">
			<div class="box">
				<div class="box-header">
					<h3>Driver</h3>
					<small>20 finished, 5 remaining</small>
				</div>
				  <ul class="list no-border p-b">
					  @foreach ($drivers as $driver)
					  <li class="list-item">
						  <a herf class="list-left">
							  <span class="w-40 avatar-circle">
								<img src="{{ url('storage/'. $driver->foto) }}" alt="...">
								<i class="on b-white bottom"></i>
							  </span>
						  </a>
						  <div class="list-body">
							<div><a href>{{ $driver->nama }}</a></div>
							<small class="text-muted text-ellipsis">{{ $driver->nik }}</small>
						  </div>
						</li>
					  @endforeach
				  </ul>
			  	<div class="box-footer">
			  		<a href class="btn btn-sm warn text-u-c pull-right">Add one</a>
			  		<a href class="btn btn-sm white text-u-c">More</a>
			  	</div>
		  	</div>
		</div>
	    <div class="col-sm-12 col-md-4">
	    	<div class="box">
				<div class="box-header">
					<span class="label success pull-right">5</span>
					<h3>Treatment</h3>
					<small>10 members update their activies.</small>
				</div>
				<div class="box-body">
				  	<div class="streamline b-l m-b m-l">
						@foreach ($treatments as $treatment)
		              <div class="sl-item">
						<div class="sl-left">
							<img src="{{ url('storage/'. $treatment->foto) }}" class="img-circle">
		                </div>
		                <div class="sl-content">
							<a href class="text-info">{{ $treatment->nama }}</a><span class="m-l-sm sl-date">{{ $treatment->created_at->diffForHumans() }}</span>
							<div>{{ $treatment->laporan }} <small class="text-muted">Rp. {{ $treatment->biaya }}</small>.</div>
							</div>
						</div>
						@endforeach
		            </div>
		            <a href class="btn btn-sm white text-u-c m-y-xs">Load More</a>
		  		</div>
			</div>
	    </div>
	</div>
</div>

<!-- ############ PAGE END-->
@endsection

@push('script-after')
	<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('assets/myscript.js') }}"></script>
@endpush