<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->member = new Member();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'membercourse' => $this->member->list()
        ];
        return view('member-course', $data);
    }
}
