<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
    }

    public function list()
    {
        $data =  $this->product->list();
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'product' => $data
        ]);
    }
}
