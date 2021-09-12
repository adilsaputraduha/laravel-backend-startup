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

    public function listStatusWaiting()
    {
        return DB::table('members')->where('memberStatus', 0)->get();
    }

    public function listStatusRegistered()
    {
        return DB::table('members')->where('memberStatus', 1)->get();
    }


    public function updateStatus($id, $data)
    {
        DB::table('members')
            ->where('memberId', '=', $id)
            ->update($data);
    }
}
