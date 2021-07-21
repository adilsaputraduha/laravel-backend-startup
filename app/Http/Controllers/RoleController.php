<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->role = new Role();
    }

    public function index()
    {
        $data = [
            'role' => $this->role->list()
        ];
        return view('role', $data);
    }

    public function save(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/role')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'roleName' => Request()->name,
                'roleCreatedAt' => date('Y-m-d H:i:s')
            ];
            $this->role->saveData($data);
            return redirect('/role')->with('success-message', 'Data saved successfully');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|max:255'
        ]);

        if ($validated->fails()) {
            return redirect('/role')->with('failed-message', 'Data failed to update')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            date_default_timezone_set('Asia/Jakarta');
            $id = Request()->id;
            $data = [
                'roleName' => Request()->name,
                'roleUpdatedAt' => date('Y-m-d H:i:s')
            ];
            $this->role->updateData($id, $data);
            return redirect('/role')->with('success-message', 'Data updated successfully');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->role->deleteData($id);
        return redirect('/role')->with('success-message', 'Data deleted successfully');
    }
}
