<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'detailTransactionId', 'detailProductId',
        'detailTotalItem', 'detailTotalPrice', 'detailNote', 'transactionExpiredAt'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, "transactionId", "detailTransactionId");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "detailProductId", "productId");
    }

    public function store()
    {
        return $this->belongsTo(Store::class, "detailProductId", "storeId");
    }

    public function list($id)
    {
        return DB::table('transaction_details')
            ->join('transactions', 'transactionId', '=', 'detailTransactionId')
            ->join('products', 'productId', '=', 'detailProductId')
            ->where('detailTransactionId', '=', $id)
            ->get();
    }
}
