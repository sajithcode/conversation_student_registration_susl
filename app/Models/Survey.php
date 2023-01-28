<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [

        'email',
        'contactNumber',
        'gender',
        'district',
        'zScore',
        'ethnicity',
        'faculty',
        'degreeFall',
        'degreeProgram',
        'degreeType',
        'specialization',
        'medium',
        'classReceived',
        'olEnglish',
        'alEnglish',
        'engSpeakSkill',
        'engListeningSkill',
        'engWritingSkill',
        'engReadingSkill',
        'computerLiteracy',
        'extraCurricular',
        'extraCurricularDes',
        'training',
        'trainingDes',
        'qualifications',
        'qualificationsDes',
        'employment',
        'employmentDes',
        'areaLive',
        'districtLife',
        'agaDivision',
        'alSchool',
        'edumf',
        'teachingMethods',
        'learningProcess',
        'qualityOfLec',
        'labFacilities',
        'qualityOfClassrooms',
        'libraryFacilities',
        'itFacilities',
        'practicalKnowledge',
        'textBooks',
        'tutorials',
        'practicalTraining',
        'researchSkills',
        'lecNotes',
        'workload',
        'qualityCommunication',
        'helpfulTeachingMaterial',
        'promotionOfInteraction',
        'assignmentAndFeedback',
        'supervisionOfProjectWork',
        'monitoringRoleModel',
        'monthlySalary',
        'situationAfterUniversityEduction',
        'lastExamDate',
        'sectorsWillingEmployee',
        'employedAfterLastExam',
        'waitedDaysForFirstJob',
        'firstAppointment',
        'currentEmploymentStatus',
        'typeEmployemt',
        'organizationCurrentlyEmployed',
        'sectorEmployed',
        'currentPosition',
        'jobEconomicSector',
        'currentGrossMonthlySalary',
        'findTheJob',
        'aspectsInGettingJob',
        'jobRelatedDegree',
        'whenFIndCurrentJob',
        'satisfiedCurrentJob',
        'howLongWaitedToGetJob',
        'lookingNowEmployee',
        'indicateReason',
        'obstaclesForJob',
        'willingToFindJob',
        'jobRequest',
        'jobOverQualified',
        'careerGoalsNextTwoYears',
        'universityEducation',
        'employmentAfterGraduation',






    ];

    public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }

}
