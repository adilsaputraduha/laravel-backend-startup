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
            'membercourse' => $this->member->listStatusWaiting(),
            'membercourseregistered' => $this->member->listStatusRegistered()
        ];
        return view('member-course', $data);
    }

    public function updatestatus()
    {
        $id = Request()->id;

        $data = [
            'memberStatus' => Request()->status
        ];

        $this->member->updatestatus($id, $data);
        return redirect('/member')->with('success-message', 'Data updated successfully');
    }
}
