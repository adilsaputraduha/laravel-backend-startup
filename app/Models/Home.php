<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    public function totalRevenue()
    {
        return DB::table('transactions')
            ->sum('transactionTotalTransfer');
    }

    public function totalOrders()
    {
        return DB::table('transactions')
            ->count('transactionId');
    }

    public function totalCustomers()
    {
        return DB::table('customers')
            ->count('customerId');
    }

    public function totalProducts()
    {
        return DB::table('products')
            ->count('productId');
    }

    public function latestTransactions()
    {
        return DB::table('transactions')
            ->limit(5)
            ->orderBy('transactionCreatedAt', 'DESC')
            ->get();
    }
}
