<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->customer = new Customer();
    }

    public function logincustomer(Request $request)
    {
        $user = Customer::where('customerEmail', $request->customerEmail)->first();
        // Cek email
        if ($user) {
            // Cek password
            if (password_verify($request->customerPassword, $user->customerPassword)) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Data berhasil ditemukan',
                    'user' => $user
                ]);
            } else {
                return $this->error('Password salah');
            }
        } else {
            return $this->error('Data tidak ditemukan');
        }
    }

    public function registercustomer(Request $request)
    {
        // Validasi input
        $validasi = Validator::make($request->all(), [
            'customerName' => 'required',
            'customerEmail' => 'required|unique:customers',
            'customerPhoneNumber' => 'required|unique:customers',
            'customerPassword' => 'required|min:6'
        ]);
        // Jika validasi tidak terpenuhi
        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }
        // Insert data kedalam database
        $data = [
            'customerName' => $request->customerName,
            'customerEmail' => $request->customerEmail,
            'customerPhoneNumber' => $request->customerPhoneNumber,
            'customerPassword' => bcrypt($request->customerPassword),
            'customerImage' => 'user.png'
        ];
        $this->customer->saveData($data);
        // Jika data berhasil disimpan
        if ($data) {
            return response()->json([
                'success' => 1,
                'message' => 'Registrasi berhasil',
                'user' => $data
            ]);
        } else {
            return $this->error('Registrasi gagal');
        }
    }

    public function updateprofile(Request $request)
    {
        $customer = Customer::where('customerId', $request->customerId)->first();

        if ($customer) {

            $data = [
                'customerName' => $request->customerName,
                'customerEmail' => $request->customerEmail,
                'customerPhoneNumber' => $request->customerPhoneNumber
            ];

            $this->customer->updateData($request->customerId, $data);

            $customerupdate = Customer::where('customerId', $request->customerId)->first();

            return response()->json([
                'success' => 1,
                'message' => 'Data berhasil ditemukan',
                'transaksi' => $customerupdate
            ]);
        } else {
            return $this->error('Data gagal ditemukan');
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
