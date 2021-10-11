<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->store = new Store();
    }

    public function list()
    {
        $data =  $this->store->list();
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'store' => $data
        ]);
    }

    public function storeproduct($id)
    {
        $data =  $this->store->storeproduct($id);
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'store' => $data
        ]);
    }

    public function storetotal($id)
    {
        $data =  $this->store->storetotal($id);
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'totalproductstore' => $data
        ]);
    }

    // Partner

    public function partnerlogin(Request $request)
    {
        $store = Store::where('storeEmail', $request->email)->first();
        // Cek email
        if ($store) {
            // Cek password
            if (password_verify($request->password, $store->storePassword)) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'store' => $store
                ]);
            } else {
                return $this->error('Password salah');
            }
        } else {
            return $this->error('Data tidak ditemukan');
        }
    }

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
