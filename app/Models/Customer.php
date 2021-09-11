<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customerName', 'customerEmail',
        'customerPhoneNumber', 'customerPassword', 'customerImage'
    ];

    public function saveData($data)
    {
        DB::table('customers')->insert($data);
        return $data;
    }

    public function list()
    {
        return DB::table('customers')
            ->get();
    }
}
