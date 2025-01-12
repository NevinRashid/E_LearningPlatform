<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'course_id',
        'rating_value'
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
