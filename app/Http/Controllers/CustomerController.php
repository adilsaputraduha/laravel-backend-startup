<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->customer = new Customer();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'customer' => $this->customer->list()
        ];
        return view('customer', $data);
    }
}
