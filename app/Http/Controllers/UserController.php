<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $customer = User::orderBy('id', 'desc')
        ->where('id','!=',Auth::user()->id)
        ->get();

        return view('admin.customer.customer', compact('customer'));
    }
}
