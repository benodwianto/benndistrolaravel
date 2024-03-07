<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening = Rekening::latest()->paginate(4);
        return view('admin.rekening.rekening', compact(['rekening']));
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
            'jenis_rekening'=>'required',
            'no_rekening'=>'required'
        ]);

        Rekening::create([
            'nama_rek'=>$request->jenis_rekening,
            'no_rek'=>$request->no_rekening,
        ]);

        return back()->with('success', 'Berhasil Menambahkan Rekening Baru');
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
        $edit_rek = Rekening::find($id);

        $rekening = Rekening::latest()->paginate(4);

        return view('admin.rekening.rekening_edit', compact(['edit_rek','rekening']));
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
            'jenis_rekening'=>'required',
            'no_rekening'=>'required'
        ]);

        Rekening::find($id)->update([
            'nama_rek'=>$request->jenis_rekening,
            'no_rek'=>$request->no_rekening,
        ]);

        return to_route('rekening.index')->with('success', 'Berhasil Menambahkan Rekening Baru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rekening::find($id)->delete();

        return back()->with('delete', 'Berhasil Menghapus Rekening');
    }
}
