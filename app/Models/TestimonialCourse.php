<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TestimonialCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'testimonialMember', 'testimonialMessage', 'testimonialImage'
    ];

    public function list()
    {
        return DB::table('testimonial_courses')
            ->join('members', 'memberId', '=', 'testimonialMember')
            ->get();
    }
}
