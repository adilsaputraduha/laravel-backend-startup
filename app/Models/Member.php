<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'memberName', 'memberEmail',
        'memberPhone', 'memberGender', 'memberAddress', 'memberStatus', 'memberCourse'
    ];

    public function list()
    {
        return DB::table('members')
            ->get();
    }
}
