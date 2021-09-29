<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reviewDate', 'reviewProduct',
        'reviewUser', 'reviewStar', 'reviewMessage'
    ];

    public function list()
    {
        return DB::table('reviews')
            ->groupBy('reviewUser')
            ->get();
    }
}
