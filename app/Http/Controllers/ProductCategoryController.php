<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->productCategory = new ProductCategory();
    }

    public function index()
    {
        $data = [
            'productCategory' => $this->productCategory->list()
        ];
        return view('product-category', $data);
    }

    public function save(Request $request)
    {
        ProductCategory::create($request->all());
        return redirect('product-category');
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $productCategory = ProductCategory::find($id);
        $productCategory->update($request->all());
        return redirect('product-category');
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();
        return redirect('product-category');
    }
}
