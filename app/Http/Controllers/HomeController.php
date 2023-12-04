<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        
    }

    public function handleAdmin() {
        $income = DB::table('transaksis_attrs')
        ->selectRaw('SUM(total_dp) as income')
        ->get();

        $dp = DB::table('transaksis_attrs')
        ->selectRaw('COUNT(status_dp) as dp')
        ->where('status_dp', '=', 1)
        ->get();

        $customer = DB::table('customers')
        ->selectRaw('COUNT(name_customer) as customer')
        ->groupBy('name_customer')
        ->get();

        $order = DB::table('transaksis_attrs')
        ->selectRaw('COUNT(*) as status_count')
        ->whereNull('status')
        ->orWhere('status', '=', '1')
        ->get();

        $orders = DB::table('transaksis')
        ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', '=', 'transaksis_attrs.id_transaksi')
        ->leftJoin('customers', 'customers.id_customer', '=', 'transaksis.id_customer')
        ->leftJoin('stocks', 'transaksis_attrs.id_product', '=', 'stocks.id_product')
        ->select('transaksis.*', 'transaksis_attrs.*', 'customers.*', 'stocks.*')
        ->whereNull('transaksis_attrs.status')
        ->orWhere('transaksis_attrs.status', '=', '1')
        ->get();

        return view('admin/handleAdmin', compact(['income', 'dp', 'customer', 'order', 'orders']));
    }
}
