<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id');
            $table->foreignId('employee_id')->nullable();
            $table->foreignId('status_application_id');
            $table->foreignId('mode_id');
            $table->foreignId('type_id');
            $table->foreignId('direction_id');
            $table->foreignId('teaching_materials_id');
            $table->foreignId('anti_plagiarism_id')->nullable();
            $table->foreignId('certificate_of_department_id');
            $table->foreignId('status_work_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
