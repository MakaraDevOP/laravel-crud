<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id('s_id');
            $table->string('s_name');
            $table->date('s_dob');
            $table->string('s_from');
            $table->date('s_register_date');
            $table->string('s_school_name');
            $table->string('s_fname')->nullable();
            $table->date('s_fdob')->nullable();
            $table->string('s_fjob')->nullable();
            $table->string('s_mname')->nullable();
            $table->date('s_mdob')->nullable();
            $table->string('s_mjob')->nullable();
            $table
                ->string('s_status')
                ->nullable()
                ->default('single');
            $table->integer('subject_id')->nullable();
            $table->integer('score_id')->nullable();
            $table->integer('attendance_id')->nullable();
            $table->integer('grade_id')->nullable();
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
        Schema::dropIfExists('student');
    }
}