<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->productCategory = new ProductCategory();
    }

    public function list()
    {
        $data =  $this->productCategory->list();
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'productcategory' => $data
        ]);
    }

    public function categoryproduct($id)
    {
        $data =  $this->productCategory->categoryProduct($id);
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'productcategory' => $data
        ]);
    }
}
