<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileCustomerController extends Controller
{
    public function index()
    {
        return view('customer.profile.profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img1'=>'required'
        ]);

        if ($request->hasFile('img1')) {
        $foto_profile = $request->file('img1')->getClientOriginalName();
        $request->img1->move(public_path('foto_profile'), $foto_profile);
        }

        $id_user = Auth::user()->id;

        User::find($id_user)->update([
            'foto_profile'=>$foto_profile
        ]);

        return back();
    }

    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
        ]);

        if ($request->password == NULL) {
            User::find($id)->update([
                'nama'=>$request->nama,
                'email'=>$request->email,
            ]);

            return back()->with('success', 'Berhasil Memperbaharui Profile');
        } else {
            User::find($id)->update([
                'nama'=>$request->nama,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);

            return back()->with('success', 'Berhasil Memperbaharui Profile');

        }

    }
}
