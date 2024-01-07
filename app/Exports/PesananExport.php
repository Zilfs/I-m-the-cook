<?php

namespace App\Exports;

use App\Models\Pesanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PesananExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $pesanan = Pesanan::all();

        return view('exports.pesanan', [
            'pesanan' => $pesanan
        ]);
    }
}
