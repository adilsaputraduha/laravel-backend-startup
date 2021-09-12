<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'user' => $this->user->list(),
            'role' => $this->role->list()
        ];
        return view('user', $data);
    }

    public function save(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'role' => 'required',
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/user')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            $password = '123456';
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'name' => Request()->name,
                'email' => Request()->email,
                'password' => Hash::make($password),
                'created_at' => date('Y-m-d H:i:s'),
                'role' => Request()->role
            ];
            $this->user->saveData($data);
            return redirect('/user')->with('success-message', 'Data saved successfully');
        }
    }

    public function update(Request $request)
    {
        // Membuat validasi
        $validated = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'role' => 'required'
        ]);

        if ($validated->fails()) {
            // Jika validasi gagal
            return redirect('/user')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            // Jika validasi berhasil
            date_default_timezone_set('Asia/Jakarta');
            $id = Request()->id;
            $data = [
                'name' => Request()->name,
                'updated_at' => date('Y-m-d H:i:s'),
                'role' => Request()->role
            ];
            $this->user->updateData($id, $data);
            return redirect('/user')->with('success-message', 'Data updated successfully');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->user->deleteData($id);
        return redirect('/user')->with('success-message', 'Data deleted successfully');
    }

    public function reset()
    {
        $id = Request()->id;
        $data = [
            'password' => Hash::make('123456'),
        ];
        $this->user->resetData($id, $data);
        return redirect('/user')->with('success-message', 'Password has been reset');
    }
}
