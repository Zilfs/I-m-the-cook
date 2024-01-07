<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromView, ShouldAutoSize
{

    public function view(): View
    {
        $transaksi = Transaksi::all();
        return view('exports.transaksi', [
            'transaksi' => $transaksi
        ]);
    }
}
