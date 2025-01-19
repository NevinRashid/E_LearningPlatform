<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class File extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'type',
        'course_id',
        ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
