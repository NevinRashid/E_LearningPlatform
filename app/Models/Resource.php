<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model 
{
    use HasFactory;

    protected $fillable = [
        'title',         // عنوان المورد (مثل اسم الكتاب أو الملف)
        'description',   // وصف المورد (اختياري)
        'file_path',     // مسار تخزين الملف
        'section_id',    // معرف القسم الذي ينتمي إليه المورد
        'uploaded_by',   // معرف المستخدم الذي رفع المورد (مثل المدرس)
    ];
}
