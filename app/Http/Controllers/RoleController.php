<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->role = new Role();
    }

    public function index()
    {
        $data = [
            'role' => $this->role->list()
        ];
        return view('role', $data);
    }
    // public function update(Request $request)
    // {
    //     $id = $request->input('id');
    //     $productCategory = ProductCategory::find($id);
    //     $productCategory->update($request->all());
    //     return redirect('product-category');
    // }
    // public function delete(Request $request)
    // {
    //     $id = $request->input('id');
    //     $productCategory = ProductCategory::find($id);
    //     $productCategory->delete();
    //     return redirect('product-category');
    // }
}
