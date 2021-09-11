<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'productCategoryName', 'productCategoryImage'
    ];

    public function list()
    {
        return DB::table('roles')->get();
    }

    public function saveData($data)
    {
        DB::table('roles')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('roles')
            ->where('roleId', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('roles')
            ->where('roleId', '=', $id)
            ->delete();
    }
}
