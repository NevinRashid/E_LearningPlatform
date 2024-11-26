<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id', // معرف القسم المرتبط
        'path',       // مسار الصورة المخزّن
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
