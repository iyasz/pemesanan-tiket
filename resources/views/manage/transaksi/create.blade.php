@extends('layout.mainlayout')

@section('content')

  <!-- Modal -->
  <div class="modal fade" id="searchTiketPesawatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tiket Pesawat</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
            <div class="input-group my-3">
                <input type="text" class="form-control" id="inpSearchTiketPesawat" placeholder="Cari Tiket Pesawat">
                <button class="btn btn-primary" id="btnSearchTiketPesawat" type="button"><i class="bi bi-search"></i></button>
              </div>
              <div class="accordion mb-3" id="accordionTiketPesawat">

              </div>
              <div class="" id="contentModalTiketPesawat">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-9 col-12 ">
                    <div class="text-center">
                        <h3>FORM TRANSAKSI</h3>
                    </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-12">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body">
                                            <div class="mb-3 d-flex">
                                                <h5>{{Auth::user()->name}}</h5>
                                                <button class="btn btn-primary ms-auto btn-sm fs-s-sm" id="btnAddNameTransaksi">Tambah</button>
                                            </div>
                                                <hr>    
                                                <div class="col-12 col-lg-7">
                                                    <h4 class="fs-s-sm">Tiket Pesawat</h4>
                                                    <input type="text" data-bs-toggle="modal" data-bs-target="#searchTiketPesawatModal" name="" class="form-control rounded-1" readonly id="searchTiketPesawat">                                                 
                                                </div>
                                                <hr>
                                            <div class="row mt-3" id="nameDetailTransaksi">
                                                <div class="col-lg-6 col-12 mb-2">
                                                    <p class="fs-s-sm fw-300 mb-1">Nama</p>
                                                    <input type="text" name="name" id="" class="form-control fs-s-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 gy-3 gy-lg-0">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body mx-2">
                                            <div class="">
                                                <h6>Payment Details</h6>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-2">
                                                    <h4 class="fs-s-sm">Tiket Pesawat</h4>
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <p class="fs-s-sm fw-300 mb-0">IDR {{number_format(0)}}</p>
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <h4 class="fs-s-sm">Total</h4>
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <p class="fs-s-sm fw-300 mb-0">IDR {{number_format(0)}}</p>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Uang Masuk">
                                                        <button class="btn btn-primary btn-sm" type="button"><i class="bi bi-search"></i></button>
                                                      </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary w-100 btn-sm mb-3 fs-s-sm rounded-1">Pay Now</button>
                                                    </div>
                                                    <hr>
                                                <div class="col-6">
                                                    <h4 class="fs-s-sm mb-0">Kembali</h4>
                                                </div>
                                                <div class="col-6">
                                                    <p class="fs-s-sm fw-300 mb-0">IDR {{number_format(300000)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
            </div>
        </div>
    </div>
@endsection
