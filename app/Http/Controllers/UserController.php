<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'user' => $this->user->list()
        ];
        return view('user', $data);
    }
}
