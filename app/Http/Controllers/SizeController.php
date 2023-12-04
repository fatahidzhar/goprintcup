<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Sizes::latest()->paginate(5);
        $category = Category::all();
        $kode = Sizes::kode();

        return view('admin.handleSize', compact(['kode', 'category' ,'size']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock');
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
            'id_size' => 'required',
            'name_size' => 'required',
        ]);

        Sizes::create($request->all());

        return redirect()->route('size.index')->with('success','Size created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_size)
    {
        $size = DB::table('sizes')
        ->select('*')
        ->where('id_size', $id_size)
        ->get();

        $category = Category::all();

        return view('admin.handleSizeEdit', compact(['size', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('sizes')->where('id_size', $request->id_size)
        ->update([
            'name_size' => $request->name_size,
        ]);

        return redirect()->route('size.index')->with('success','Category Update successfully.');
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
