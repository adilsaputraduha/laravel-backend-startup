<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->home = new Home();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'totalrevenue' => $this->home->totalRevenue(),
            'totalorders' => $this->home->totalOrders(),
            'totalcustomers' => $this->home->totalCustomers(),
            'totalproducts' => $this->home->totalProducts(),
            'latesttransactions' => $this->home->latestTransactions()
        ];
        return view('home', $data);
    }
}
