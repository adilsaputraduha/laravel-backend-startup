<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->store = new Store();
    }

    public function list()
    {
        $data =  $this->store->list();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditemukan',
            'user' => $data
        ]);
    }
}
