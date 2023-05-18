<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiket = Tiket::all();
        return view('manage.tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $start_city = Http::get('https://api.rajaongkir.com/starter/city?key=179ae16b7b1883dc77ab80d40c52d141')->json();
        return view('manage.tiket.create', compact('start_city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'maskapai' => 'required',
            'start_city' => 'required',
            'city_destination' => 'required',
            'harga' => 'required',
            'total_penumpang' => 'required',
            'waktu_penerbangan' => 'required',
            'jam_penerbangan' => 'required',
            'class' => 'required',
        ]);
        $request['tiket_code'] = random_int(00000000, 100000000);
        Tiket::create($request->except('_token'));
        return redirect('/tiket')->with('success', 'Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tiket = Tiket::findOrFail($id);
        return view('manage.tiket.detail', compact('tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $start_city = Http::get('https://api.rajaongkir.com/starter/city?key=179ae16b7b1883dc77ab80d40c52d141')->json();
        $tiket = Tiket::findOrFail($id);
        return view('manage.tiket.edit', compact('tiket', 'start_city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tiket = Tiket::findOrFail($id);
        $validate = $request->validate([
            'maskapai' => 'required',
            'start_city' => 'required',
            'city_destination' => 'required',
            'harga' => 'required',
            'total_penumpang' => 'required',
            'waktu_penerbangan' => 'required',
            'jam_penerbangan' => 'required',
            'class' => 'required',
        ]);
        $tiket->update($request->except('_token'));
        return redirect('/tiket')->with('success', 'Data Berhasil Diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->delete();
        return redirect('/tiket')->with('success', 'Data Berhasil Dihapus');
    }
}
