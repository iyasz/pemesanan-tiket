@extends('layout.mainlayout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-9 col-12 ">
                <form action="/admin/{{$admin->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="text-center">
                        <h3>FORM EDIT ADMIN</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Name</label>
                                <input type="text" value="{{$admin->name}}" name="name" class="form-control fs-s-sm @error("name") is-invalid @enderror">
                                @error("name") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Email</label>
                                <input type="text" value="{{$admin->email}}" name="email" class="form-control fs-s-sm @error("email") is-invalid @enderror">
                                @error("email") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Username</label>
                                <input type="text" value="{{$admin->username}}" name="username" class="form-control fs-s-sm @error("username") is-invalid @enderror">
                                @error("username") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-4">
                                <label class="mb-1 fs-s-sm opacity-75">Password</label>
                                <input type="text" name="password" class="form-control fs-s-sm @error("password") is-invalid @enderror">
                                @error("password") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="mb-2 text-center">
                                <button class="btn btn-primary w-100 rounded-1 fs-s-sm fw-500 py-2 mb-2">Ubah</button>
                                <a href="/admin" class="fs-s-sm">Kembali</a>
                            </div>
                         </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
@endsection
