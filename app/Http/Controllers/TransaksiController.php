<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pelanggan::where('status', NULL)->get();

        return view('pages.transaksi.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Transaksi::all();
        return view('pages.transaksi.history', [
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        Transaksi::create([
            'id_pelanggan' => $id,
            'total' => $request->total,
            'bayar' => $request->bayar
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'status' => 'PAID'
        ]);

        return redirect()->route('transaksi.index');
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
        $data = Pesanan::with('menu')->where('id_pelanggan', $id)->get();
        $id_pelanggan = $id;

        return view('pages.transaksi.checkout', [
            'data' => $data,
            'id_pelanggan' => $id_pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Transaksi::create([
            'id_pelanggan' => $id,
            'total' => $request->total,
            'bayar' => $request->bayar
        ]);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new TransaksiExport, 'Data Transaksi.xlsx');
    }
}
