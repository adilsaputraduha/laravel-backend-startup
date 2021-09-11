<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->course = new Course();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'course' => $this->course->list()
        ];
        return view('course', $data);
    }
}
