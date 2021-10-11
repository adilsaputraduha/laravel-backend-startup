<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productName', 'productDescription',
        'productStore', 'productCategory', 'productPrice', 'productStock',
        'productRating', 'productSold', 'productImage',
        'productStatus', 'productWeight', 'productLength', 'productWide', 'productHigh', 'productPromo', 'productSatuan'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, "productStore", "storeId");
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, "productCategory", "productCategoryId");
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, "reviewProduct", "productId");
    }

    public function list()
    {
        return DB::table('products')
            ->join('product_categories', 'productCategoryId', '=', 'productCategory')
            ->join('stores', 'storeId', '=', 'productStore')
            ->get();
    }

    public function latest()
    {
        return DB::table('products')
            ->join('product_categories', 'productCategoryId', '=', 'productCategory')
            ->join('stores', 'storeId', '=', 'productStore')
            ->orderByDesc('productCreatedAt')
            ->get();
    }

    public function orderby()
    {
        return DB::table('products')
            ->join('product_categories', 'productCategoryId', '=', 'productCategory')
            ->join('stores', 'storeId', '=', 'productStore')
            ->orderByDesc('productCreatedAt')
            ->get();
    }

    public function saveData($data)
    {
        DB::table('products')->insert($data);
    }

    public function updateRating($data, $id)
    {
        DB::table('products')
            ->where('productId', '=', $id)
            ->update($data);
    }

    public function updateStock($dataone, $productId)
    {
        DB::table('products')
            ->where('productId', '=', $productId)
            ->update($dataone);
    }

    public function deleteData($id)
    {
        DB::table('products')
            ->where('productId', '=', $id)
            ->delete();
    }
}
