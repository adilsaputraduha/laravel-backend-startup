<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->kota = new Kota();
    }

    public function list()
    {
        $kota =  $this->kota->list();

        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'kota' =>  collect($kota)
        ]);
    }
}
