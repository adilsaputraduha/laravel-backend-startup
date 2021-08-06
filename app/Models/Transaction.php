<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transactionUserId', 'transactionPaymentCode',
        'transactionCode', 'transactionTotalItem', 'transactionTotalPrice', 'transactionUniqueCode',
        'transactionStatus', 'transactionReceipt', 'transactionCourier', 'transactionName',
        'transactionPhone', 'transactionLocationDetail', 'transactionMethod',
        'transactionDescription', 'transactionExpiredAt'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, "transactionId", "detailTransactionId");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "userId", "transactionUserId");
    }
}
