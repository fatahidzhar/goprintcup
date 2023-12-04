<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi;
use App\Models\Transaksis_attrs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('transaksis')
        ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', '=', 'transaksis_attrs.id_transaksi')
        ->leftJoin('customers', 'customers.id_customer', '=', 'transaksis.id_customer')
        ->leftJoin('stocks', 'transaksis_attrs.id_product', '=', 'stocks.id_product')
        ->select('transaksis.invoice', 'transaksis.image as image_product', 'transaksis.vendor','transaksis_attrs.*', 'transaksis_attrs.qty as qty_customer', 'customers.*', 'stocks.*')
        ->orderByDesc('transaksis.invoice')
        ->get();
        return view('admin.handleorder', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $stocks = DB::table('stocks')
        ->leftJoin('sizes', 'stocks.id_size', "=", 'sizes.id_size')
        ->select('stocks.name_product', 'stocks.total_price', 'stocks.selling_price', 'stocks.price_income', 'sizes.name_size', 'stocks.id_product', 'stocks.qty')
        ->get();

        $kode = Transaksi::kode();
        $kode_t = Transaksi::kode_t();   
        $kode_c = Customer::kode_c();   

        return view('admin.handleorder', compact(['stocks', 'kode', 'kode_t', 'kode_c']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice' => 'required',
            'id_transaksi' => 'required',
            'id_customer' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'vendor' => 'nullable',
        ]);

        $data = Transaksi::create($request->all());

        if($request->hasFile('image')) {
            $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();;
        }

        $customers = new Customer;
        $customers->id_customer = $request['id_customer'];
        $customers->name_customer = $request['name_customer'];
        $customers->address = $request['address'];
        $customers->city = $request['city'];
        $customers->zip_code = $request['zip_code'];
        $customers->no_phone = $request['no_phone'];
        $customers->save();

        $transaksis_attrs = new Transaksis_attrs;
        $transaksis_attrs->id_product = $request['id_product']; 
        $transaksis_attrs->id_transaksi = $request['id_transaksi']; 
        $transaksis_attrs->total_price = $request['total_price']; 
        $transaksis_attrs->qty = $request['qty']; 
        $transaksis_attrs->dp = $request['dp']; 
        $transaksis_attrs->total_dp = $request['total_dp']; 
        $transaksis_attrs->status_dp = $request['status_dp']; 
        $transaksis_attrs->status = $request['status'];
        $transaksis_attrs->save();

        return redirect()->route('order.index')->with('success','Order successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_customer)
    {
        $stocks = DB::table('transaksis')
        ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', '=', 'transaksis_attrs.id_transaksi')
        ->leftJoin('customers', 'customers.id_customer', '=', 'transaksis.id_customer')
        ->leftJoin('stocks', 'transaksis_attrs.id_product', '=', 'stocks.id_product')
        ->select('transaksis.*', 'transaksis_attrs.qty', 'transaksis_attrs.total_price as total', 'transaksis_attrs.dp', 'transaksis_attrs.total_dp', 'transaksis_attrs.qty as qty_customer', 'customers.*', 'stocks.*')
        ->where('customers.id_customer' , '=', $id_customer)
        ->get();

        $pdf = PDF::loadView('admin.handleOrderShow', compact(['stocks']));
        return $pdf->stream($id_customer, '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_customer)
    {
        $stocks = DB::table('stocks')
        ->leftJoin('sizes', 'stocks.id_size', "=", 'sizes.id_size')
        ->select('stocks.name_product', 'stocks.total_price', 'stocks.selling_price', 'stocks.price_income', 'sizes.name_size', 'stocks.id_product', 'stocks.qty')
        ->get();

        $orders = DB::table('transaksis')
        ->leftJoin('transaksis_attrs', 'transaksis.id_transaksi', '=', 'transaksis_attrs.id_transaksi')
        ->leftJoin('customers', 'customers.id_customer', '=', 'transaksis.id_customer')
        ->leftJoin('stocks', 'transaksis_attrs.id_product', '=', 'stocks.id_product')
        ->select('transaksis.*', 'transaksis.image as image_product','transaksis_attrs.qty', 'transaksis_attrs.total_price as total', 'transaksis_attrs.dp', 'transaksis_attrs.total_dp', 'transaksis_attrs.qty as qty_customer', 'transaksis_attrs.status', 'customers.*', 'stocks.*')
        ->where('customers.id_customer' , '=', $id_customer)
        ->get();

        return view('admin/handleOrderEdit', compact('orders', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {

        DB::table('customers')->where('id_customer', $request->id_customer)
        ->update([
            'name_customer' => $request->name_customer,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'no_phone' => $request->no_phone
        ]);
        
        DB::table('transaksis_attrs')->where('id_transaksi', $request->id_transaksi)
        ->update([
            'total_price' => $request->total_price,
            'qty' => $request->qty,
            'dp' => $request->dp,
            'total_dp' => $request->total_dp,
            'status_dp' => $request->status_dp,
            'status' => $request->status
        ]);

        return redirect('/order')->with('success','Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
