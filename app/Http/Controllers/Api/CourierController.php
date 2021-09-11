<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function __construct()
    {
        $this->courier = new Courier();
    }

    public function list()
    {
        $data =  $this->courier->list();
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'courier' => $data
        ]);
    }
}
