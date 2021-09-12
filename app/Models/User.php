<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function list()
    {
        return DB::table('users')
            ->join('roles', 'roleId', '=', 'role')
            ->get();
    }

    public function saveData($data)
    {
        DB::table('users')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('users')
            ->where('id', '=', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('users')
            ->where('id', '=', $id)
            ->delete();
    }

    public function resetData($id, $data)
    {
        DB::table('users')
            ->where('id', '=', $id)
            ->update($data);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
