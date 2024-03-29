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
        ]);
    }
}
