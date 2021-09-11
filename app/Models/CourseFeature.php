<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'courseFeatureName'
    ];

    public function list()
    {
        return DB::table('course_features')
            ->get();
    }
}
