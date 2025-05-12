<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->string('regNum')->unique();
            $table->string('email');
            $table->string('contactNumber');
            $table->string('gender');
            $table->string('age');
            $table->string('al_stream');
            $table->string('al_district');
            $table->string('al_zscore', 5, 4);
            $table->string('al_year');
            $table->string('ol_english');
            $table->string('al_english');
            $table->string('faculty');
            $table->string('department');
            $table->string('degree_programme');
            $table->string('degree_type');
            $table->string('medium')->default('English');
            $table->string('class_obtained');
            $table->string('eng_speaking');
            $table->string('eng_listening');
            $table->string('eng_writing');
            $table->string('eng_reading');
            $table->string('computer_literacy_level');
            $table->longText('abilities');
            $table->string('internship_yesno');
            $table->string('internship_duration');
            $table->string('internship_graded');
            $table->string('internship_semester');
            $table->string('other_courses_yesno');
            $table->string('other_course_type');
            $table->string('other_course_field');
            $table->string('other_course_completed');
            $table->text('extra_activities')->nullable();
            $table->string('employment_status');
            $table->string('employment_type');
            $table->string('employment_permanence');
            $table->string('employer_sector');
            $table->string('employer_name');
            $table->string('occupation_category');
            $table->string('job_economic_sector');
            $table->string('when_found_job');
            $table->string('job_field_match');
            $table->string('use_skills');
            $table->string('outside_field_due');
            $table->string('salary_expectation');
            $table->string('gross_salary')->nullable();
            $table->string('career_growth_sat');
            $table->string('consider_change');
            $table->string('unemp_reasons');
            $table->string('unemp_reasons_other')->nullable();
            $table->string('future_employment_type');
            $table->string('expected_sector');
            $table->string('took_steps');
            $table->text('job_search_steps');
            $table->string('job_search_steps_other')->nullable();
            $table->string('reservation_wage');
            $table->string('expected_occupation');
            $table->string('expected_job_economic_sector');
            $table->string('job_search_duration')->nullable();
            $table->text('career_goals');
            $table->string('career_goals_other')->nullable();
            $table->string('university_satisfaction');
            $table->text('dissatisfaction_reasons');
            $table->string('teaching_methods');
            $table->string('learning_process');
            $table->string('lecturer_quality');
            $table->string('lab_facilities');
            $table->string('classroom_quality');
            $table->string('library_facilities');
            $table->string('it_facilities');
            $table->string('workload');
            $table->string('last_university_exam');
            $table->string('facilitate_employment');
            $table->text('other_comments')->nullable();
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
        Schema::dropIfExists('survey_responses');
    }
}
