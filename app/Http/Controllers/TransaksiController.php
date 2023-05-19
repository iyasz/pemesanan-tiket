<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Tiket;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('manage.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiket = Tiket::all();
        return view('manage.transaksi.create', compact('tiket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trx = Transaksi::findOrfail($id);
        $detail = DetailTransaksi::where('transaksi_id' , $id)->first();
        return view('manage.transaksi.detail', compact('trx', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function SearchTiketPesawat()
    {
        $tiket = Tiket::all();
        return $tiket;
    }

    public function getValueFromModal(Request $request)
    {
        $tiket = Tiket::findOrFail($request->input('id'));
        return $tiket;
    }

    public function insertPaymentFromTransaksi(Request $request)
    {
        $trx = Transaksi::create([
            'invoice_code' => random_int(00000000, 100000000),
            'user_id' => Auth::user()->id,
            'payment_method' => $request->input('payment_method'),
            'total_harga' => $request->input('total'),
            'bayar' => $request->input('bayar'),
            'kembali' => $request->input('kembali'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        foreach ($request->input('names') as $name) {
            DetailTransaksi::create([
                'transaksi_id' => $trx->id,
                'tiket_id' => $request->input('id'),
                'name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return "berhasil";
    }
}
