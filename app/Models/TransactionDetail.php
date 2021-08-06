<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
