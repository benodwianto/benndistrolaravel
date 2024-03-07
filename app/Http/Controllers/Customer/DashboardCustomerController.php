<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
    public function index()
    {
        return to_route('customer.produk');
    }
}
