@extends('layout.mainlayout')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Tiket Code</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$tiket->tiket_code}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Maskapai</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$tiket->maskapai}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Start City</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$tiket->start_city}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">City Destination</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$tiket->city_destination}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Harga</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">Rp. {{number_format($tiket->harga)}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Transit</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$tiket->transit == NULL ? 'Tidak Ada Transit' : $tiket->transit . " Kali Transit"}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Total Penumpang</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$tiket->total_penumpang}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Jadwal Penerbangan</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{date('d M Y - h - i - s', strtotime($tiket->jam_penerbangan))}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Waktu Penerbangan</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{date('h', strtotime($tiket->waktu_penerbangan))}} Jam {{date('i', strtotime($tiket->waktu_penerbangan))}} Menit </p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Type</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">
                                    @if($tiket->class == 1)
                                        Kelas Ekonomi
                                    @elseif($tiket->class == 2)
                                        Kelas Ekonomi Premium
                                    @elseif($tiket->class == 3)
                                        Bisnis
                                    @else
                                        Kelas Satu
                                    @endif
                                </p>
                            </div>
                            <hr class="mx-3 my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
