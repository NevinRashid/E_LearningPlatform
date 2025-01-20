<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvSubmission extends Model
{
    use HasFactory;

      // تحديد الحقول التي يمكن ملؤها في قاعدة البيانات
      protected $fillable = ['course_id', 'cv_path', 'status'];
}



