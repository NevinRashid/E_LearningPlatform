<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'level',
        'price',
        'capacity',
        'start_date',
        'category_id',
        ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function users() {
        return $this->belongsToMany(User::class,'course_user','course_id','user_id');
    }
}
