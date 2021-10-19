<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->store = new Store();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'store' => $this->store->list()
        ];
        return view('store', $data);
    }

    public function save(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phonenumber' => 'required|max:255',
            'zipcode' => 'required|max:255',
            'street' => 'required|max:255',
            'district' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/store')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            $createdAt = now();
            // Jika validasi berhasil
            $data = [
                'storeName' => Request()->name,
                'storeEmail' => Request()->email,
                'storePhoneNumber' => Request()->phonenumber,
                'storeZipCode' => Request()->zipcode,
                'storeStreet' => Request()->street,
                'storeDistrict' => Request()->district,
                'storeCity' => Request()->city,
                'storeProvince' => Request()->province,
                'storePassword' => bcrypt('123456'),
                'storeJoin' => $createdAt
            ];
            $this->store->saveData($data);
            return redirect('/store')->with('success-message', 'Data saved successfully');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phonenumber' => 'required|max:255',
            'zipcode' => 'required|max:255',
            'street' => 'required|max:255',
            'district' => 'required|max:255',
            'city' => 'required|max:255',
            'province' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            return redirect('/store')->with('failed-message', 'Data failed to update')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $id = Request()->id;
            $data = [
                'storeName' => Request()->name,
                'storeEmail' => Request()->email,
                'storePhoneNumber' => Request()->phonenumber,
                'storeZipCode' => Request()->zipcode,
                'storeStreet' => Request()->street,
                'storeDistrict' => Request()->district,
                'storeCity' => Request()->city,
                'storeProvince' => Request()->province,
                'storePassword' => bcrypt($request->customerPassword)
            ];
            $this->store->updateData($id, $data);
            return redirect('/store')->with('success-message', 'Data updated successfully');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->store->deleteData($id);
        return redirect('/store')->with('success-message', 'Data deleted successfully');
    }

    public function reset()
    {
        $id = Request()->id;
        $data = [
            'storePassword' => Hash::make('123456'),
        ];
        $this->store->resetData($id, $data);
        return redirect('/store')->with('success-message', 'Password has been reset');
    }
}
