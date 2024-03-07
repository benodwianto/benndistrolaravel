<?php

namespace App\Http\Controllers;

use App\Models\Sablon;
use Illuminate\Http\Request;

class AplikasiSablonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sablon = Sablon::latest()->paginate(4);
        return view('admin.sablon.sablon', compact('sablon'));
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
            'sablon'=>'required|unique:sablon,jenis_sablon',
            'harga_sablon'=>'required',
        ]);

        $nilai_awal =  preg_replace('/[Rp.,]/','',$request->harga_sablon);
        $harga = substr($nilai_awal, 0, -2);

        Sablon::create([
            'jenis_sablon'=>$request->sablon,
            'harga_sablon'=>$harga
        ]);

        return back()->with('success', 'Berhasil Menambahkan Aplikasi Sablon Baru');
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
        $update = Sablon::find($id);
        $sablon = Sablon::latest()->paginate(4);

        return view('admin.sablon.sablon_edit', compact(['update', 'sablon']));
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
            'sablon'=>'required|unique:sablon,jenis_sablon',
            'harga_sablon'=>'required',
        ]);

        $nilai_awal =  preg_replace('/[Rp.,]/','',$request->harga_sablon);
        $harga = substr($nilai_awal, 0, -2);

        Sablon::where('id_sablon', $id)->update([
            'jenis_sablon'=>$request->sablon,
            'harga_sablon'=>$harga
        ]);

        return to_route('sablon.index')->with('success', 'Berhasil Menperbaharui Aplikasi Sablon Baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sablon::where('id_sablon', $id)->delete();
        return to_route('sablon.index')->with('delete', 'Berhasil Menghapus Aplikasi Sablon');
    }
}
