<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'comment_text'
        ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
