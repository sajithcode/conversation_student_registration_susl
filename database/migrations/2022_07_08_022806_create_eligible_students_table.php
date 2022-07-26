<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEligibleStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eligible_students', function (Blueprint $table) {
            $table->id();
            $table->string('nameWithInitials');
//            $table->string('fullNameInEnglishBlock');
//            $table->string('fullNameInSinhala');
            $table->string('gender');
//            $table->string('email');
            $table->string('degreeName');
            $table->string('regNum');
            $table->string('indexNum');
//            $table->string('monthAndYearExamination');
            $table->string('degreeClass');

            $table->string('faculty');

            $table->string('department')->default('Never');

            $table->string('cloakIssueDate')->default('Not Yet');
            $table->string('cloakReturnDate')->default('Not Yet');
            $table->string('garlandReturnDate')->default('Not Yet');

            $table->string('status')->default('Pending');

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
        Schema::dropIfExists('eligible_students');
    }
}
