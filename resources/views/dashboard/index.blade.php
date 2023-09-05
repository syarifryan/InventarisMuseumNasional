@extends('layouts.dashboard')

@section('title', 'Dashboard | Inventaris Koleksi Museum')

@section('content')
<div class="col-12">

    <div class="col-lg-12 mb-8 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang, di Sistem Inventaris Koleksi Museum 
                        </h5>
                        <p class="mb-8">
                            Sistem ini digunakan untuk menginputkan data koleksi museum
                        </p>
                        <a href="{{ route('dashboard.proses.index')}}" class="btn btn-sm btn-outline-primary">Proses Inventaris Koleksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row g-32 mb-24">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                                <i class="iconly-Light-Chart text-primary hp-text-color-dark-primary-2" style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{$sensor->co ?? '-'}} User</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">User Registered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-warning-4 hp-bg-color-dark-warning rounded-circle">
                                <i class="iconly-Light-Chart text-warning" style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{$sensor->nh3 ?? '-'}} Koleksi</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">Jumlah Inventaris</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-secondary-4 hp-bg-color-dark-secondary rounded-circle">
                                <i class="iconly-Light-Chart text-secondary" style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{$sensor->no2 ?? '-'}} ppm</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">NO2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/chartsloader.js') }}"></script>
    <script type="text/javascript">
        
        
    </script>

@endsection

