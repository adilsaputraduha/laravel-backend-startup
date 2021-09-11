<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->productCategory = new ProductCategory();
        $this->middleware('auth');
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
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/product-category')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $file = '';
            if ($request->image->getClientOriginalName()) {
                $file = str_replace(' ', '_', $request->image->getClientOriginalName());
                $fileName =  date('mYdHs') . rand(1, 999) . '_' . $file;
                $request->image->storeAs('public/images/productcategory', $fileName);
            }

            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'productCategoryName' => Request()->name,
                'productCategoryImage' => $fileName
            ];
            $this->productCategory->saveData($data);
            return redirect('/product-category')->with('success-message', 'Data saved successfully');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            return redirect('/product-category')->with('failed-message', 'Data failed to update')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            date_default_timezone_set('Asia/Jakarta');
            $id = Request()->id;
            $data = [
                'productCategoryName' => Request()->name,
                'productCategoryUpdatedAt' => date('Y-m-d H:i:s')
            ];
            $this->productCategory->updateData($id, $data);
            return redirect('/product-category')->with('success-message', 'Data updated successfully');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->productCategory->deleteData($id);
        return redirect('/product-category')->with('success-message', 'Data deleted successfully');
    }
}
