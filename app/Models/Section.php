<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',   // رقم تعريف الدورة التعليمية
        'title',       // عنوان القسم
        'description', // وصف القسم (اختياري)
        'order',       // الترتيب الذي يظهر فيه القسم ضمن الدورة
        'duration',    // مدة القسم (اختياري) مثل عدد الساعات
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class); // علاقة القسم بالتسجيلات
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
