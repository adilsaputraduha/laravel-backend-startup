<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->review = new Review();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'review' => $this->review->list()
        ];
        return view('review', $data);
    }
}
