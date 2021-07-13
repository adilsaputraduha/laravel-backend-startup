<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $data = [
            'product' => $this->product->list()
        ];
        return view('product', $data);
    }
}
