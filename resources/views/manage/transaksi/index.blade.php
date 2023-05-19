@extends('layout.mainlayout')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="text-end">
                    <a href="/transaksi/create" class="btn btn-primary rounded-1 fw-300">Create</a>
                </div>
               <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="my-3">
                        <input type="text" id="inputSearchData" class="form-control rounded-0">
                    </div>
                </div>
               </div>
               @if(SESSION("success"))
                    <div class="alert alert-success fs-s-sm text-center" role="alert">
                        {{SESSION("success")}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Admin</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Total Harga</th>
                                        <th>Uang Masuk</th>
                                        <th>Kembali</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody id="dataAll">
                                @foreach ($transaksi as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->user->name}}</td>
                                    <td>{{$data->payment_method == 1 ? 'Cash' : 'Online'}}</td>
                                    <td>Rp. {{number_format($data->total_harga)}}</td>
                                    <td>Rp. {{number_format($data->bayar)}}</td>
                                    <td>Rp. {{number_format($data->kembali)}}</td>
                                    <td class="d-flex">
                                        <a href="/transaksi/{{$data->id}}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
