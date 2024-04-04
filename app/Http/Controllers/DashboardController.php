<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $revenue = Transaksi::all()->sum('total');
        $customer = Pelanggan::all()->count();
        $today_revenue = Transaksi::whereDay('created_at', Carbon::today())->get()->sum('total');
        $today_customer = Pelanggan::whereDay('created_at', Carbon::today())->get()->count();
        $today_transaksi = Transaksi::whereDay('created_at', Carbon::today())->get();
        $menu = Menu::all();
        $pesanan = Pelanggan::whereDay('created_at', Carbon::today())->get();
        $users = User::all();
        $transactions = Transaksi::whereDay('created_at', Carbon::today())->get();
        $month_revenue = [
            'jan' => Transaksi::whereMonth('created_at', 01)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'feb' => Transaksi::whereMonth('created_at', 02)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'mar' => Transaksi::whereMonth('created_at', 03)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'apr' => Transaksi::whereMonth('created_at', 04)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'may' => Transaksi::whereMonth('created_at', 05)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'jun' => Transaksi::whereMonth('created_at', 06)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'jul' => Transaksi::whereMonth('created_at', 07)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'aug' => Transaksi::whereMonth('created_at', 8)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'sep' => Transaksi::whereMonth('created_at', 9)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'oct' => Transaksi::whereMonth('created_at', 10)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'nov' => Transaksi::whereMonth('created_at', 11)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
            'dec' => Transaksi::whereMonth('created_at', 12)->whereYear('created_at', Carbon::now()->year)->get()->sum('total'),
        ];

        return view('pages.dashboard.index', [
            'revenue' => $revenue,
            'customer' => $customer,
            'menu' => $menu,
            'pesanan' => $pesanan,
            'today_revenue' => $today_revenue,
            'today_customer' => $today_customer,
            'today_transaksi' => $today_transaksi,
            'users' => $users,
            'transactions' => $transactions,
            'month_revenue' => $month_revenue,
        ]);
    }
}
