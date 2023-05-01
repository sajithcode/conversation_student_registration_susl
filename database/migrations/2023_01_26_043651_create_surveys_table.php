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
            $table->id();
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
            $table->longText('extraCurricularDes')->nullable();
            $table->string('training');
            $table->longText('trainingDes')->nullable();
            $table->string('qualifications');
            $table->longText('qualificationsDes')->nullable();
            $table->string('employment');
            $table->longText('employmentDes')->nullable();
            $table->string('areaLive');
            $table->string('districtLife');
            $table->string('agaDivision');
            $table->string('alSchool');
            $table->longText('edumf');
            $table->longText('teachingMethods');
            $table->longText('learningProcess');
            $table->longText('qualityOfLec');
            $table->longText('labFacilities');
            $table->longText('qualityOfClassrooms');
            $table->string('libraryFacilities');
            $table->string('itFacilities');
            $table->string('practicalKnowledge');
            $table->string('textBooks');
            $table->string('tutorials');
            $table->string('practicalTraining');
            $table->string('researchSkills');
            $table->string('lecNotes');
            $table->string('workload');
            $table->longText('qualityCommunication')->nullable();
            $table->longText('helpfulTeachingMaterial')->nullable();
            $table->longText('promotionOfInteraction')->nullable();
            $table->longText('assignmentAndFeedback')->nullable();
            $table->longText('supervisionOfProjectWork')->nullable();
            $table->longText('monitoringRoleModel')->nullable();
            $table->string('monthlySalary');
            $table->string('situationAfterUniversityEduction');
            $table->string('lastExamDate');
            $table->string('sectorsWillingEmployee');
            $table->string('employedAfterLastExam');
            $table->longText('waitedDaysForFirstJob')->nullable();
            $table->longText('firstAppointment')->nullable();
            $table->string('currentEmploymentStatus');
            $table->longText('typeEmployemt')->nullable();
            $table->longText('organizationCurrentlyEmployed')->nullable();
            $table->longText('sectorEmployed')->nullable();
            $table->longText('currentPosition')->nullable();
            $table->longText('jobEconomicSector')->nullable();
            $table->longText('currentGrossMonthlySalary')->nullable();
            $table->longText('findTheJob')->nullable();
            $table->longText('aspectsInGettingJob')->nullable();
            $table->longText('jobRelatedDegree')->nullable();
            $table->longText('whenFIndCurrentJob')->nullable();
            $table->longText('satisfiedCurrentJob')->nullable();
            $table->longText('howLongWaitedToGetJob')->nullable();
            $table->longText('lookingNowEmployee');
            $table->longText('indicateReason')->nullable();
            $table->longText('obstaclesForJob')->nullable();
            $table->longText('willingToFindJob');
            $table->longText('jobRequest');
            $table->longText('jobOverQualified');
            $table->longText('careerGoalsNextTwoYears');
            $table->longText('universityEducation');
            $table->longText('employmentAfterGraduation');
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
        Schema::dropIfExists('surveys');
    }
}
