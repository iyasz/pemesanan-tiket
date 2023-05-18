@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mt-3">
                    <h1>Hi {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
