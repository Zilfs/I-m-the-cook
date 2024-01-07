<?php

namespace App\Http\Controllers;

use App\Exports\PesananExport;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pelanggan::all();

        return view('pages.pesanan.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $menu = Menu::all();
        $id_pelanggan = $id;

        return view('pages.pesanan.add', [
            'menu' => $menu,
            'id_pelanggan' => $id_pelanggan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        Pesanan::create([
            'id_menu' => $request->id_menu,
            'id_pelanggan' => $id,
            'id_user' => Auth::user()->id,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('pesanan-for', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pesanan::where('id_pelanggan', $id)->get();
        $id_pelanggan = $id;

        return view('pages.pesanan.show', [
            'data' => $data,
            'id_pelanggan' => $id_pelanggan
        ]);
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
    public function update(Request $request, string $id, $id_pelanggan)
    {
        $item = Pesanan::findOrFail($id);
        $item->update(
            [
                'jumlah' => $request->jumlah
            ]
        );

        return redirect()->route('pesanan.show', $id_pelanggan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $id_pelanggan)
    {
        $item = Pesanan::findOrFail($id);
        $item->delete();

        return redirect()->route('pesanan.show', $id_pelanggan);
    }

    public function export()
    {
        return Excel::download(new PesananExport, 'Data Pesanan.xlsx');
    }
}
