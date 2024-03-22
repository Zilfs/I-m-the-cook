<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\Meja;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        if ($request->bayar < $request->total) {
            return redirect()->route('transaksi.edit', $id)->with('failed-checkout', 'Uang yang dibayarkan kurang');
        } else {

            Transaksi::create([
                'id_pelanggan' => $id,
                'total' => $request->total,
                'bayar' => $request->bayar
            ]);

            $pelanggan = Pelanggan::findOrFail($id);

            $pelanggan->update([
                'status' => 'PAID'
            ]);

            if ($pelanggan->id_meja) {
                $meja = Meja::findOrFail($pelanggan->id_meja);

                $meja->update([
                    'status' => 'TERSEDIA',
                ]);

                $pelanggan->update([
                    'id_meja' => NULL,
                ]);
            }

            $id_transaksi = Transaksi::latest()->first()->id;

            return redirect()->route('transaksi.show', $id_transaksi)->with('success-checkout', 'Berhasil melakukan pembayaran');
        }
    }

    public function history()
    {
        $data = Transaksi::all();
        return view('pages.transaksi.history', [
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $data = Pesanan::with('menu')->where('id_pelanggan', $transaksi->id_pelanggan)->get();

        return view('pages.transaksi.show', [
            'data' => $data,
            'transaksi' => $transaksi,
            'id_pelanggan' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pesanan::with('menu')->where('id_pelanggan', $id)->get();

        return view('pages.transaksi.checkout', [
            'data' => $data,
            'id_pelanggan' => $id
        ]);
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

    public function receipt(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pesanan = Pesanan::with('menu')->where('id_pelanggan', $transaksi->id_pelanggan)->get();

        $pdf = Pdf::loadView('pdf.receipt', [
            'transaksi' => $transaksi,
            'pesanan' => $pesanan,
        ]);
        return $pdf->download('receipt-' . $transaksi->id . '-' . $transaksi->created_at . '.pdf');
    }

    public function export()
    {
        // return Excel::download(new TransaksiExport, 'Data Transaksi.xlsx');

        $transaksi = Transaksi::all();
        $total_pendapatan = $transaksi->sum('total');

        $pdf = Pdf::loadView('pdf.transaksi-report', [
            'data' => $transaksi,
            'total_pendapatan' => $total_pendapatan,
        ]);
        return $pdf->download('laporan-transaksi-' . Carbon::today() . '.pdf');
    }
}
