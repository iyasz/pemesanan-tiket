@extends('layout.mainlayout')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="text-end">
                    <a href="/tiket/create" class="btn btn-primary rounded-1 fw-300">Create</a>
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
                                        <th>Tiket Code</th>
                                        <th>Maskapai</th>
                                        <th>From</th>
                                        <th>Destination City</th>
                                        <th>Jadwal</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody id="dataAll">
                                @foreach ($tiket as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->tiket_code}}</td>
                                    <td>{{$data->maskapai}}</td>
                                    <td>{{$data->start_city}}</td>
                                    <td>{{$data->city_destination}}</td>
                                    <td>{{date('d M Y : H:m ', strtotime($data->jam_penerbangan))}}</td>
                                    <td class="d-flex">
                                        <a href="/tiket/{{$data->id}}/edit" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                        <form action="/tiket/{{$data->id}}" method="POST" class="mx-1">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apakah anda ingin menghapus data tiket penerbangan ini?')" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                        </form>
                                        <a href="/tiket/{{$data->id}}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
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
