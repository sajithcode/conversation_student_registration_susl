@extends('layouts.app')


@section('content')

    <div style="margin: 50px"  class="">
        <div class="row" style="margin: 50px">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(checkPermission(['Admin','surveyAccess']))
        <div style="overflow-x:auto;">
            <div class="row">

                    <form method="GET" action="{{route('exportsurvey')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-xs-10 col-sm-10 col-md-10" >
                                    <div class="form-group">
                                        <strong>Convocation:</strong>
                                        {{ Form::select('convocationName', $convo, null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2" style="display: inline-flex;justify-content: center">
                                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Export Survey</button>
                                </div>
                            </div>
                            {{--                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>--}}
                        </div>
                    </form>
            </div>
            <table class="table table-bordered form-duration-div">
                <tr>
                    <th>Name</th>
                    <th>RegNum</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <th>District</th>
                    <th>Z-Score</th>
                    <th>Ethnicity</th>
                    <th>Faculty/Institution:</th>
                    <th>Under which of the following does your degree fall?</th>
                    <th>Name of the Degree Programme: EX: BSC Business Administration(Business Economics)(Honours)</th>
                    <th>Degree type:</th>
                    <th>If Special/Honours, please specify area of specialization: (EX: Economics)</th>
                    <th>Medium of Instruction</th>

                    <th>Class received:</th>
                    <th>The Grade you received for GCE(O/L) English Language</th>
                    <th>The Grade you received for GCE(A/L) General English</th>
                    <th>Speaking Skills</th>
                    <th>Listening Skills</th>
                    <th>Writing Skills</th>
                    <th>Reading Skills</th>
                    <th>Your computer literacy</th>
                    <th>Extra-curricular activities</th>
                    <th>Specification of Extra-curricular activities</th>
                    <th>Internships/Vocational training</th>
                    <th>Specification of Internships/Vocational training</th>
                    <th>Other educational/professional qualifications</th>
                    <th>Specification of Other educational/professional qualifications</th>
                    <th>Full/part-time employment</th>
                    <th>Specification of Full/part-time employment</th>
                    <th>Which sort of area have you lived most of your life</th>
                    <th>(District) Area in Sri Lanka that you lived in for most of your life</th>
                    <th>(AGA Division) Area in Sri Lanka that you lived in for most of your life</th>
                    <th>What type of school did you go to for your GCE A/L?</th>
                    <th>What is the highest level of education achieved by either your father and/or mother?</th>

                    <th>Teaching methods used at the university are effective</th>
                    <th>Learning process is suitable for current job environment</th>
                    <th>The quality of lecturers/instructors is good</th>
                    <th>The lab facilities provided are satisfactory</th>
                    <th>The quality of classrooms is good</th>
                    <th>The library facilities are satisfactory</th>
                    <th>IT facilities are satisfactory</th>
                    <th>Practical knowledge is acquired through course work</th>
                    <th>Text books are used in courses taught</th>
                    <th>Tutorials are used as learning tools</th>
                    <th>Practical training is a part of the university education</th>
                    <th>Research skills are developed during the study period</th>
                    <th>Learning is mostly done by memorizing the lecture notes</th>
                    <th>Workload assigned is very high</th>
                    <th>Quality communication at lectures or laboratories</th>
                    <th>Helpful teaching material</th>
                    <th>Promotion of interaction through group work</th>
                    <th>Assignment and feedback given</th>
                    <th>Supervision of project work</th>
                    <th>Mentoring and being a role model</th>
                    <th>How much did you expect your gross monthly salary(In Rupees) to be after your university education?</th>
                    <th>Which of the following describes your situation after your university education</th>
                    <th>When was your last university exam</th>
                    <th>Which sector(s) are you willing to be employed in?</th>
                    <th>Were you employed at any point after your last exam?</th>
                    <th>How long did you wait to get your first job after the last day of final exam</th>
                    <th>What is the date of your first appointment?</th>
                    <th>What is your current employment status?</th>
                    <th>Type of employment</th>
                    <th>Name of the organization currently employed</th>
                    <th>Which sector are you employed in?</th>
                    <th>The position you hold currently?</th>
                    <th>To which economic sector does your current job belong to?</th>
                    <th>What is your current gross monthly salary (In Rupees)?</th>
                    <th>How did you find this job?</th>
                    <th>What do you think were the most important aspects in getting this job?</th>
                    <th>Is this job related to the field you studies in your degree?</th>
                    <th>When did you find your current job?</th>
                    <th>How satisfied are you with your current job?</th>
                    <th>How long have you been waited to get this job since the effecive date of your degree?</th>
                    <th>Are looking for employment right now?</th>
                    <th>If no, please indicate the reason(s) and skip to 40)</th>
                    <th>What do you think are the main obstacles for you to get a job? Please give details</th>
                    <th>Accept a job that is not in the field you stuied at the university </th>
                    <th>Move if a job requires it</th>
                    <th>Accept a job that you are over-qualified for </th>
                    <th>What are the career goals for the next two years?</th>
                    <th>How satisfied are you with your university education?</th>
                    <th>What do you think could be done to facilitate the first employment after graduation?</th>
                    <th>Convocation Name</th>
                </tr>
                @foreach ($surveys as $survey)
                    <tr>
                        <td>{{$survey->stdName}}</td>
                        <td>{{$survey->regNum}}</td>
                        <td>{{$survey->email}}</td>
                        <td>{{$survey->contactNumber}}</td>
                        <td>{{$survey->gender}}</td>
                        <td>{{$survey->district}}</td>
                        <td>{{$survey->zScore}}</td>
                        <td>{{$survey->ethnicity}}</td>
                        <td>{{$survey->faculty}}</td>
                        <td>{{$survey->degreeFall}}</td>
                        <td>{{$survey->degreeProgram}}</td>
                        <td>{{$survey->degreeType}}</td>
                        <td>{{$survey->specialization}}</td>
                        <td>{{$survey->medium}}</td>
                        <td>{{$survey->classReceived}}</td>
                        <td>{{$survey->olEnglish}}</td>
                        <td>{{$survey->alEnglish}}</td>
                        <td>{{$survey->engSpeakSkill}}</td>
                        <td>{{$survey->engListeningSkill}}</td>
                        <td>{{$survey->engWritingSkill}}</td>
                        <td>{{$survey->engReadingSkill}}</td>
                        <td>{{$survey->computerLiteracy}}</td>
                        <td>{{$survey->extraCurricular}}</td>
                        <td>{{$survey->extraCurricularDes}}</td>
                        <td>{{$survey->training}}</td>
                        <td>{{$survey->trainingDes}}</td>
                        <td>{{$survey->qualifications}}</td>
                        <td>{{$survey->qualificationsDes}}</td>
                        <td>{{$survey->employment}}</td>
                        <td>{{$survey->employmentDes}}</td>
                        <td>{{$survey->areaLive}}</td>
                        <td>{{$survey->districtLife}}</td>
                        <td>{{$survey->agaDivision}}</td>
                        <td>{{$survey->alSchool}}</td>
                        <td>{{$survey->edumf}}</td>
                        <td>{{$survey->teachingMethods}}</td>
                        <td>{{$survey->learningProcess}}</td>
                        <td>{{$survey->qualityOfLec}}</td>
                        <td>{{$survey->labFacilities}}</td>
                        <td>{{$survey->qualityOfClassrooms}}</td>
                        <td>{{$survey->libraryFacilities}}</td>
                        <td>{{$survey->itFacilities}}</td>
                        <td>{{$survey->practicalKnowledge}}</td>
                        <td>{{$survey->textBooks}}</td>
                        <td>{{$survey->tutorials}}</td>
                        <td>{{$survey->practicalTraining}}</td>
                        <td>{{$survey->researchSkills}}</td>
                        <td>{{$survey->lecNotes}}</td>
                        <td>{{$survey->workload}}</td>
                        <td>{{$survey->qualityCommunication}}</td>
                        <td>{{$survey->helpfulTeachingMaterial}}</td>
                        <td>{{$survey->promotionOfInteraction}}</td>
                        <td>{{$survey->assignmentAndFeedback}}</td>
                        <td>{{$survey->supervisionOfProjectWork}}</td>
                        <td>{{$survey->monitoringRoleModel}}</td>
                        <td>{{$survey->monthlySalary}}</td>
                        <td>{{$survey->situationAfterUniversityEduction}}</td>
                        <td>{{$survey->lastExamDate}}</td>
                        <td>{{$survey->sectorsWillingEmployee}}</td>
                        <td>{{$survey->employedAfterLastExam}}</td>
                        <td>{{$survey->waitedDaysForFirstJob}}</td>
                        <td>{{$survey->firstAppointment}}</td>
                        <td>{{$survey->currentEmploymentStatus}}</td>
                        <td>{{$survey->typeEmployemt}}</td>
                        <td>{{$survey->organizationCurrentlyEmployed}}</td>
                        <td>{{$survey->sectorEmployed}}</td>
                        <td>{{$survey->currentPosition}}</td>
                        <td>{{$survey->jobEconomicSector}}</td>
                        <td>{{$survey->currentGrossMonthlySalary}}</td>
                        <td>{{$survey->findTheJob}}</td>
                        <td>{{$survey->aspectsInGettingJob}}</td>
                        <td>{{$survey->jobRelatedDegree}}</td>
                        <td>{{$survey->whenFIndCurrentJob}}</td>
                        <td>{{$survey->satisfiedCurrentJob}}</td>
                        <td>{{$survey->howLongWaitedToGetJob}}</td>
                        <td>{{$survey->lookingNowEmployee}}</td>
                        <td>{{$survey->indicateReason}}</td>
                        <td>{{$survey->obstaclesForJob}}</td>
                        <td>{{$survey->willingToFindJob}}</td>
                        <td>{{$survey->jobRequest}}</td>
                        <td>{{$survey->jobOverQualified}}</td>
                        <td>{{$survey->careerGoalsNextTwoYears}}</td>
                        <td>{{$survey->universityEducation}}</td>
                        <td>{{$survey->employmentAfterGraduation}}</td>
                        <td>{{$survey->convocationName}}</td>


                    </tr>
                @endforeach

            </table>

    </div>
    @endif
@endsection
