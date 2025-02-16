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

            $table->string('faculty');
            $table->string('department')->default('Null');

            $table->string('degreeName');
            $table->string('regNum');
            $table->string('indexNum');
            $table->string('monthAndYearExamination');
//            $table->string('monthExamination');
//            $table->string('yearExamination');
            $table->string('degreeClass')->nullable();;
            $table->string('attendance');
            $table->string('nameVisitor1')->nullable();
            $table->string('nameVisitor2')->nullable();
            $table->string('nicVisitor1')->nullable();
            $table->string('nicVisitor2')->nullable();

            $table->string('image');

            $table->string('signedDate');

            $table->string('status')->default('Pending');
            $table->string('statusMessage')->default('none')->nullable();

            $table->string('convocationName');


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
