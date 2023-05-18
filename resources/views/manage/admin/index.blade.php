@extends('layout.mainlayout')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="text-end">
                    <a href="/admin/create" class="btn btn-primary rounded-1 fw-300">Create</a>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody id="dataAll">
                                @foreach ($admin as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td class="d-flex">
                                        <a href="/admin/{{$data->id}}/edit" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                        <form action="/admin/{{$data->id}}" method="POST" class="mx-1">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apakah anda ingin menghapus data {{$data->name}} ?')" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                        </form>
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
