<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->store = new Store();
    }

    public function index()
    {
        $data = [
            'store' => $this->store->list()
        ];
        return view('store', $data);
    }
}
