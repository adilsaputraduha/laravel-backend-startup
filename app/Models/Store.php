<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'storeName', 'storeEmail', 'storePhoneNumber', 'storeStreet', 'storeDistrict',
        'storeCity', 'storeProvince', 'storeZipCode', 'storePassword', 'storeJoin'
    ];

    public function list()
    {
        return DB::table('stores')->get();
    }

    public function storeproduct($id)
    {
        return DB::table('stores')
            ->where('storeId', '=', $id)
            ->get();
    }

    public function storetotal($id)
    {
        return DB::table('products')
            ->select(DB::raw("COUNT(productId) as jumlah"))
            ->where('productStore', '=', $id)
            ->get();
    }

    public function saveData($data)
    {
        DB::table('stores')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('stores')
            ->where('storeId', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('stores')
            ->where('storeId', '=', $id)
            ->delete();
    }

    public function resetData($id, $data)
    {
        DB::table('stores')
            ->where('storeId', '=', $id)
            ->update($data);
    }
}
