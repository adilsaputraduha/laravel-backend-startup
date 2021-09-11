<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'productName', 'productDescription',
        'productStore', 'productCategory', 'productPrice', 'productImage',
        'productStatus', 'productCreatedAt', 'productUpdatedAt'
    ];

    public function list()
    {
        return DB::table('courses')
            ->get();
    }
}
