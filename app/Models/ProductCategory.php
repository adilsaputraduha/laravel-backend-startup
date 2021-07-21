<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('product_categories')->get();
    }

    public function saveData($data)
    {
        DB::table('product_categories')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('product_categories')
            ->where('productCategoryId', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('product_categories')
            ->where('productCategoryId', '=', $id)
            ->delete();
    }
}
