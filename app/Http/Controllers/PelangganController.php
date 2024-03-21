<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $meja = Meja::where('status', 'TERSEDIA')->get();

        return view('pages.pelanggan.add', [
            'meja' => $meja,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_meja' => $request->no_meja,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        if ($request->no_meja) {
            $meja = Meja::findOrFail($request->no_meja);
            $meja->update([
                'status' => 'DIGUNAKAN',
            ]);
        }

        $id_pelanggan = Pelanggan::latest()->first()->id;

        return redirect()->route('pesanan-for', $id_pelanggan);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
