<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    public function list()
    {
        return DB::table('transactions')
            ->join('detail_transactions', 'transactionId', '=', 'detailTransactionId')
            ->join('users', 'transactionUserId', '=', 'id')
            ->get();
    }

    public function saveData($data)
    {
        DB::table('transactions')->insert($data);
    }
}
