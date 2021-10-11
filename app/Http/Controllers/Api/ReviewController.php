<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->review = new Review();
    }

    public function list()
    {
        $data =  $this->review->list();
        return response()->json([
            'success' => 1,
            'message' => 'Data berhasil ditemukan',
            'review' => $data
        ]);
    }
}
