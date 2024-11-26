<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',      // معرف الطالب
        'section_id',   // معرف القسم
        'status',       // حالة التسجيل (مثل: مكتمل، جاري، لم يبدأ)
        'completion_date', // تاريخ إتمام الدراسة (اختياري)
    ];

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
