<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();

            $table->string('nameWithInitial');
            $table->string('fullNameInEnglishBlock');
            $table->string('fullNameInSinhala');
            $table->string('gender');
            $table->string('nic');
            $table->string('address');
            $table->string('mobileNumber');
            $table->string('email');
            $table->string('degreeName');
            $table->string('regNum');
            $table->string('indexNum');
            $table->string('monthExamination');
            $table->string('yearExamination');
            $table->string('degreeClass');
            $table->string('attendance');
            $table->string('nameVisitor1');
            $table->string('nameVisitor2');
            $table->string('nicVisitor1');
            $table->string('nicVisitor2');
            $table->string('signedDate');

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
        Schema::dropIfExists('student_registrations');
    }
}
