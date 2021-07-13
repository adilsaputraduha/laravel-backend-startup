<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('products')
            ->join('product_categories', 'productCategoryId', '=', 'productCategory')
            ->join('stores', 'storeId', '=', 'productStore')
            ->get();
    }
}
