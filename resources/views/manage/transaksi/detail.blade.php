@extends('layout.mainlayout')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <h4>Transaksi</h4>
                </div>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Invoice Code</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$trx->invoice_code}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Tiket Code</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$detail->tiket->tiket_code}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Start City</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$detail->tiket->start_city}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">City Destination</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$detail->tiket->city_destination}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Jadwal Penerbangan</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{date('d M Y - h - i - s', strtotime($detail->tiket->jam_penerbangan))}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Payment Method</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$trx->payment_method == 1 ? 'Cash' : 'Online'}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Total</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">Rp. {{number_format($trx->total_harga)}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Bayar</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">Rp. {{number_format($trx->bayar)}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Kembali</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">Rp. {{number_format($trx->kembali)}}</p>
                            </div>
                            <hr class="mx-3 my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="">
                    <h4>Nama Penumpang</h4>
                </div>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <hr class="mx-3 my-4">
                            @foreach ($trx->detail as $data)
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="mb-0 ms-0 ms-md-4 ms-lg-4">Nama Penumpang {{$loop->iteration}}</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="fw-300 fs-s-sm mb-0">{{$data->name}}</p>
                            </div>
                            <hr class="mx-3 my-4">                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
