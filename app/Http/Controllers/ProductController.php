<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
        $this->store = new Store();
        $this->productCategory = new ProductCategory();
    }

    public function index()
    {
        $data = [
            'product' => $this->product->list(),
            'store' => $this->store->list(),
            'productCategory' => $this->productCategory->list()
        ];
        return view('product', $data);
    }

    public function save(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'price' => 'required|max:11',
            'description' => 'required|max:255',
            'store' => 'required|max:11',
            'productcategory' => 'required|max:11',
            'status' => 'required|max:1',
            'image' => 'required|mimes:jpg,jpeg,bmp,png,svg'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/product')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $file = '';
            if ($request->image->getClientOriginalName()) {
                $file = str_replace(' ', '_', $request->image->getClientOriginalName());
                $fileName =  date('mYdHs') . rand(1, 999) . '_' . $file;
                $request->image->storeAs('public/images/products', $fileName);
            }
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'productName' => Request()->name,
                'productPrice' => Request()->price,
                'productStore' => Request()->store,
                'productCategory' => Request()->productcategory,
                'productDescription' => Request()->description,
                'productImage' => $fileName,
                'productStatus' => Request()->status,
                'productCreatedAt' => date('Y-m-d H:i:s')
            ];
            $this->product->saveData($data);
            return redirect('/product')->with('success-message', 'Data saved successfully');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->product->deleteData($id);
        return redirect('/product')->with('success-message', 'Data deleted successfully');
    }
}
