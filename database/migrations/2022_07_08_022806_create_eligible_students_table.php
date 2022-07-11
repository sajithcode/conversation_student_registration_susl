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
            $table->string('regNum');
            $table->string('indexNum');
            $table->string('faculty');
            $table->string('department');
            $table->string('degreeName');

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
