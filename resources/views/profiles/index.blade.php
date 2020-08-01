@extends('layouts.app')

@section('content')
    
<div ui-view class="app-body" id="view">
    <div class="item padding">
        <div class="box">
            <div class="item-bg">
                <img src="../assets/images/a1.jpg" class="blur opacity-3">
            </div>
            <div class="p-a-md">
                <div class="row m-t">
                    <div class="col-sm-7">
                        <a href class="pull-left m-r-md">
                            <span class="avatar w-96">
                                <img src="{{ asset('flatkit/assets/images/a1.jpg') }}">
                                <i class="on b-white"></i>
                            </span>
                        </a>
                        <div class="clear m-b">
                            <h3 class="m-0 m-b-xs">{{ $driver->nama }}</h3>
                            <p class="text-muted"><span class="m-r">{{ $driver->nik }}</span></p>
                            <div class="block clearfix m-b">
                                @if ($driver->alamat)
                                <small class="text-muted"><i class="fa fa-map-marker m-r-xs"></i>{{ $driver->alamat }}</small>
                                @endif
                            </div>
                            <button href class="btn btn-sm warn btn-rounded m-b">{{ $driver->role }}</button>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <p class="text-md profile-status">{{ $driver->no_hp }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-header">
            <h3>Riwayat Laporan</h3>
        </div>
        <div class="box-body">
            <div class="p-a">
                <div class="streamline b-l m-b">
                    @foreach ($laporan as $l)
                    <div class="sl-item b-success">
                        <div class="sl-content">
                            <div class="sl-date text-muted">{{ $l->created_at->diffForHumans() }}</div>
                            <p>{{ $l->laporan }}</p>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection