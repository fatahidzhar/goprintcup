<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sizes;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StockProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        $size = Sizes::all();
        $kode = Stocks::kode();

        $r_stocks = DB::table('stocks')
        ->leftJoin('categories', 'stocks.id_category', '=', 'categories.id_category')
        ->leftJoin('sizes', 'stocks.id_size', '=', 'sizes.id_size')
        ->select('stocks.image', 'stocks.name_product', 'categories.name_category', 'sizes.name_size', 'stocks.total_price', 'stocks.qty', 'stocks.id_product')
        ->get();

        return view('admin/handleStock', compact(['category', 'size', 'kode', 'r_stocks']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_product' => 'required',
            'id_category' => 'required',
            'id_size' => 'required',
            'name_product' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'selling_price' => 'required',
            'price_income' => 'required',
            'total_price' => 'required',
            'qty' => 'required',
        ]);

        $data = Stocks::create($request->all());

        if($request->hasFile('image')) {
            $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('product.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_category)
    {
        $data = Sizes::where('id_category', $id_category)->get();
        Log::info($data);
        return response()->json(['data' => $data]);
        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        $r_stocks = DB::table('stocks')
        ->leftJoin('categories', 'stocks.id_category', '=', 'categories.id_category')
        ->leftJoin('sizes', 'stocks.id_size', '=', 'sizes.id_size')
        ->select('stocks.*', 'categories.*', 'sizes.*')
        ->where('stocks.id_product', $id_product)
        ->get();

        return view('admin.handleProductEdit', compact('r_stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_product)
    {
        DB::table('stocks')->where('id_product', $request->id_product)
        ->update([
            'id_category' => $request->id_category,
            'id_size' => $request->id_size,
            'name_product' => $request->name_product,
            'selling_price' => $request->selling_price,
            'price_income' => $request->price_income,
            'total_price' => $request->total_price,
            'qty' => $request->qty
        ]);

        return redirect()->route('product.index')->with('success','Product Update successfully.');

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
