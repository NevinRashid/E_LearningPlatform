<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cv_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // علاقة مع جدول الكورس
            $table->string('cv_path'); // حفظ مسار ملف الـ CV
            $table->enum('status', ['Accepted', 'Rejected', 'Pending']); // الحالة بالإنجليزية
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_submissions');
    }
};
