<?php

namespace App\Http\Controllers;

use App\Models\Variasi;
use Illuminate\Http\Request;

class VariasiProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variasi = Variasi::latest()->paginate(4);
        return view('admin.variasi.variasi', compact('variasi'));
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
            'variasi'=>'required|unique:variasi,jenis_variasi',
            'harga_variasi'=>'required',
        ]);

        $nilai_awal =  preg_replace('/[Rp.,]/','',$request->harga_variasi);
        $harga = substr($nilai_awal, 0, -2);

        Variasi::create([
            'jenis_variasi'=>$request->variasi,
            'harga_variasi'=>$harga,
        ]);

        return back()->with('success','Berhasil Membuat Variasi Baru');
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
    public function edit($id)
    {
        $update = Variasi::find($id);
        $variasi = Variasi::latest()->paginate(4);

        return view('admin.variasi.variasi_edit', compact(['update','variasi']));
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
        $request->validate([
            'variasi'=>'required',
            'harga_variasi'=>'required',
        ]);

        $nilai_awal =  preg_replace('/[Rp.,]/','',$request->harga_variasi);
        $harga = substr($nilai_awal, 0, -2);

        Variasi::where('id_variasi', $id)->update([
            'jenis_variasi'=>$request->variasi,
            'harga_variasi'=>$harga,
        ]);

        return to_route('variasi.index')->with('success','Berhasil Memperbaharui Variasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Variasi::where('id_variasi', $id)->delete();
        return to_route('variasi.index')->with('delete','Berhasil Menghapus Variasi Produk');
    }
}
