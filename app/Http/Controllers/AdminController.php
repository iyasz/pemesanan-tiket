<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::all();
        return view('manage.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manage.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);
        $request['password'] = password_hash($request->password, PASSWORD_BCRYPT);
        User::create($request->except('_token'));
        return redirect('/admin')->with('success', 'Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::findOrFail($id);
        return view('manage.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$admin->id,
            'username' => 'required|unique:users,username,' . $admin->id,
        ]);

        if($request->password){
            $request['password'] = password_hash($request->password, PASSWORD_BCRYPT);
            $admin->update($request->except('_token'));
            return redirect('/admin')->with('success', 'Data Berhasil Diubah');
        }

        $admin->update($request->except('_token', 'password'));
        return redirect('/admin')->with('success', 'Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect('/admin')->with('success', 'Data Berhasil Dihapus');
    }
}
