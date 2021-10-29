<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kota extends Model
{
    use HasFactory;

    protected $fillable = [
        'kotaKode', 'kotaName'
    ];

    public function list()
    {
        return DB::table('kotas')->get();
    }
}
