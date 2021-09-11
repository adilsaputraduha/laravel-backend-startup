<?php

namespace App\Http\Controllers;

use App\Models\CourseFeature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->courseFeature = new CourseFeature();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'coursefeature' => $this->courseFeature->list()
        ];
        return view('course-feature', $data);
    }
}
