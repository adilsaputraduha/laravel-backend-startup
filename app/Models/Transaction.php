<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transactionUserId', 'transactionPaymentCode',
        'transactionCode', 'transactionTotalItem', 'transactionTotalPrice', 'transactionUniqueCode',
        'transactionStatus', 'transactionReceipt', 'transactionCourier', 'transactionCostShipping',
        'transactionTotalTransfer', 'transactionBank', 'transactionName',
        'transactionPhone', 'transactionMethod', 'transactionLocationDetail', 'transactionMethod',
        'transactionDescription', 'transactionExpiredAt', 'transactionCreatedAt', 'transactionStore'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, "detailTransactionId", "transactionId");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, "transactionUserId", "customerId");
    }

    public function courier()
    {
        return $this->belongsTo(User::class, "transactionCourier", "courierId");
    }

    public function updateData($id, $data)
    {
        DB::table('transactions')
            ->where('transactionId', '=', $id)
            ->update($data);
    }

    public function list()
    {
        return DB::table('transactions')
            ->get();
    }

    public function listdetail($id)
    {
        return DB::table('transactions')
            ->join('transaction_details', 'transactionId', '=', 'detailTransactionId')
            ->join('users', 'transactionUserId', '=', 'id')
            ->join('couriers', 'transactionCourier', '=', 'courierId')
            ->where('transactionId', '=', $id)
            ->limit(1)
            ->get();
    }

    public function listStatusDiproses()
    {
        return DB::table('transactions')->where('transactionStatus', 'DIPROSES')->get();
    }

    public function listStatusDikirim()
    {
        return DB::table('transactions')->where('transactionStatus', 'DIKIRIM')->get();
    }

    public function listStatusBatal()
    {
        return DB::table('transactions')->where('transactionStatus', 'BATAL')->get();
    }

    public function updateStatus($id, $data)
    {
        DB::table('transactions')
            ->where('transactionId', '=', $id)
            ->update($data);
    }

    public function listProductOrder($id)
    {
        return DB::table('transaction_details')
            ->join('transactions', 'transactionId', '=', 'detailTransactionId')
            ->join('products', 'detailProductId', '=', 'productId')
            ->where('detailTransactionId', $id)->get();
    }
}
