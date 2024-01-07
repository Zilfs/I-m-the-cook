<?php

namespace App\Exports;

use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MenuExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $menu = Menu::all();

        return view('exports.menu', [
            'menu' => $menu
        ]);
    }
}
