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
        $this->middleware('auth');
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
            $data = [
                'roleName' => Request()->name
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
            $id = Request()->id;
            $data = [
                'roleName' => Request()->name
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
