@extends('layout.mainlayout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-9 col-12 ">
                <form action="/tiket" method="POST">
                    @csrf
                    <div class="text-center">
                        <h3>FORM TIKET</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Maskapai</label>
                                <input type="text" value="{{old("maskapai")}}" name="maskapai" class="form-control fs-s-sm @error("maskapai") is-invalid @enderror">
                                @error("maskapai") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Start City</label>
                                <select class="form-select start-city fs-s-sm @error("start_city") is-invalid @enderror" name="start_city">
                                    <option selected disabled></option>
                                    @foreach ($start_city['rajaongkir']['results'] as $data)
                                    <option value="{{$data['city_name']}}">{{$data['type']}} - {{$data['city_name']}}</option>
                                    @endforeach
                                  </select>
                                @error("start_city") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">City Destination</label>
                                <input type="text" value="{{old("city_destination")}}" name="city_destination" class="form-control fs-s-sm @error("city_destination") is-invalid @enderror">
                                @error("city_destination") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Harga</label>
                                <input type="text" id="rupiahConvert" class="form-control fs-s-sm @error("harga") is-invalid @enderror">
                                <input type="text" id="rupiahResultConvert" value="" name="harga" class="form-control d-none fs-s-sm ">
                                @error("harga") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Transit</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switch-transit">
                                  </div>                                  
                                <input type="number" name="transit" id="transitValue" class="form-control d-none fs-s-sm @error("transit") is-invalid @enderror">
                                @error("transit") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Total Penumpang</label>
                                <input type="number" value="{{old("total_penumpang")}}" name="total_penumpang" class="form-control fs-s-sm @error("total_penumpang") is-invalid @enderror">
                                @error("total_penumpang") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Waktu Penerbangan</label>
                                <input type="time" value="{{old("waktu_penerbangan")}}" name="waktu_penerbangan" class="form-control fs-s-sm @error("waktu_penerbangan") is-invalid @enderror">
                                @error("waktu_penerbangan") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Jadwal Penerbangan</label>
                                <input type="datetime-local" value="{{old("jam_penerbangan")}}" name="jam_penerbangan" class="form-control fs-s-sm @error("jam_penerbangan") is-invalid @enderror">
                                @error("jam_penerbangan") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror
                           </div>
                            <div class="mb-3">
                                <label class="mb-1 fs-s-sm opacity-75">Class</label>
                                <select name="class" class="form-select fs-s-sm" id="">
                                    <option disabled selected>Choose An Option</option>
                                    <option value="1">Ekonomi</option>
                                    <option value="2">Ekonomi Premium</option>
                                    <option value="3">Bisnis</option>
                                    <option value="4">Kelas Satu</option>
                                </select>
                                @error("class") <p class="fs-s-sm mb-0 fw-300 text-danger">{{$message}}</p> @enderror

                             
                           </div>
                            <div class="mb-2 text-center">
                                <button class="btn btn-primary w-100 rounded-1 fs-s-sm fw-500 py-2 mb-2">Create</button>
                                <a href="/tiket" class="fs-s-sm">Kembali</a>
                            </div>
                         </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
@endsection
