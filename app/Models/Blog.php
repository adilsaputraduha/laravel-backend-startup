<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blogTitle', 'blogSlug', 'blogContent', 'blogImage', 'blogView', 'blogDate', 'blogUser'
    ];

    public function list()
    {
        return DB::table('blogs')
            ->join('users', 'id', '=', 'blogUser')
            ->get();
    }

    public function saveData($data)
    {
        DB::table('blogs')->insert($data);
    }

    public function deleteData($id)
    {
        DB::table('blogs')
            ->where('blogId', '=', $id)
            ->delete();
    }
}
