<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionDetail extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('detail_transactions')
            ->join('transactions', 'detailTransactionId', '=', 'transactionId')
            ->join('products', 'detailProductId', '=', 'productId')
            ->get();
    }

    public function saveData($data)
    {
        DB::table('detail_transactions')->insert($data);
    }
}
