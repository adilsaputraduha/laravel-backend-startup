<?php

namespace App\Http\Controllers;

use App\Models\TestimonialCourse;
use Illuminate\Http\Request;

class TestimonialCourseController extends Controller
{
    public function __construct()
    {
        $this->testimonial = new TestimonialCourse();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'testimonial' => $this->testimonial->list()
        ];
        return view('testimonial-course', $data);
    }
}
