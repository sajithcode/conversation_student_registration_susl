<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->string('stdName');
            $table->string('regNum')->unique();

            $table->string('email');
            $table->string('contactNumber');
            $table->string('gender');
            $table->string('district');
            $table->string('zScore');
            $table->string('ethnicity');
            $table->string('faculty');
            $table->string('degreeFall');
            $table->string('degreeProgram');
            $table->string('degreeType');
            $table->string('specialization');
            $table->string('medium')->default('English');
            $table->string('classReceived');
            $table->string('olEnglish');
            $table->string('alEnglish');
            $table->string('engSpeakSkill');
            $table->string('engListeningSkill');
            $table->string('engWritingSkill');
            $table->string('engReadingSkill');
            $table->string('computerLiteracy');
            $table->string('extraCurricular');
            $table->string('extraCurricularDes')->nullable();
            $table->string('training');
            $table->string('trainingDes')->nullable();
            $table->string('qualifications');
            $table->string('qualificationsDes')->nullable();
            $table->string('employment');
            $table->string('employmentDes')->nullable();
            $table->string('areaLive');
            $table->string('districtLife');
            $table->string('agaDivision');
            $table->string('alSchool');
            $table->string('edumf');
            $table->string('teachingMethods');
            $table->string('learningProcess');
            $table->string('qualityOfLec');
            $table->string('labFacilities');
            $table->string('qualityOfClassrooms');
            $table->string('libraryFacilities');
            $table->string('itFacilities');
            $table->string('practicalKnowledge');
            $table->string('textBooks');
            $table->string('tutorials');
            $table->string('practicalTraining');
            $table->string('researchSkills');
            $table->string('lecNotes');
            $table->string('workload');
            $table->string('qualityCommunication')->nullable();
            $table->string('helpfulTeachingMaterial')->nullable();
            $table->string('promotionOfInteraction')->nullable();
            $table->string('assignmentAndFeedback')->nullable();
            $table->string('supervisionOfProjectWork')->nullable();
            $table->string('monitoringRoleModel')->nullable();
            $table->string('monthlySalary');
            $table->string('situationAfterUniversityEduction');
            $table->string('lastExamDate');
            $table->string('sectorsWillingEmployee');
            $table->string('employedAfterLastExam');
            $table->string('waitedDaysForFirstJob')->nullable();
            $table->string('firstAppointment')->nullable();
            $table->string('currentEmploymentStatus');
            $table->string('typeEmployemt')->nullable();
            $table->string('organizationCurrentlyEmployed')->nullable();
            $table->string('sectorEmployed')->nullable();
            $table->string('currentPosition')->nullable();
            $table->string('jobEconomicSector')->nullable();
            $table->string('currentGrossMonthlySalary')->nullable();
            $table->string('findTheJob')->nullable();
            $table->string('aspectsInGettingJob')->nullable();
            $table->string('jobRelatedDegree')->nullable();
            $table->string('whenFIndCurrentJob')->nullable();
            $table->string('satisfiedCurrentJob')->nullable();
            $table->string('howLongWaitedToGetJob');
            $table->string('lookingNowEmployee');
            $table->string('indicateReason')->nullable();
            $table->string('obstaclesForJob')->nullable();
            $table->string('willingToFindJob');
            $table->string('jobRequest');
            $table->string('jobOverQualified');
            $table->string('careerGoalsNextTwoYears');
            $table->string('universityEducation');
            $table->string('employmentAfterGraduation');
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
        Schema::dropIfExists('surveys');
    }
}
