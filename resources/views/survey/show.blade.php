@extends('layouts.app')

@section('content')
    @if(checkPermission(['Admin','surveyAccess']))
    <div class="row" style="margin: 50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Survey from {{$survey->stdName}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
            </div>
        </div>

        <div style="margin: 20px" class="row">
            <strong>01. Contact Details:</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Email:</strong>
                    <input class="form-control" readonly value={{$survey->email}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Contact Number:</strong>
                    <input class="form-control" readonly value={{$survey->contactNumber}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                {{--                <div class="form-group">--}}
                {{--                    {{Form::label('property', 'Please Select a Property ') }}--}}
                {{--                    {{Form::select('property', ['Holiday Resort' => 'Holiday Resort', 'NEST' => 'NEST','Agri Farm Kabana' => 'Agri Farm Kabana', 'Agri Farm Dining Room' => 'Agri Farm Dining Room', 'Audio Visual Unit' => 'Audio Visual Unit'], null, ['class'=>'form-control','v-model' => 'property_type'])}}--}}

                {{--                </div>--}}

                <div class="form-group">

                    <strong>02. Gender:</strong>
                    <input class="form-control" readonly value={{$survey->gender}}>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>03. GCE (A/L) Examination, District:</strong>
                    <input class="form-control" readonly value={{$survey->district}}>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>04. GCE (A/L) Examination, Z-Score or Aggregate Marks:</strong>
                    <input class="form-control" readonly value={{$survey->zScore}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>05. Ethnicity:</strong>
                    <input class="form-control" readonly value={{$survey->ethnicity}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>05. Faculty/Institution:</strong>
                    <input class="form-control" readonly value={{$survey->faculty}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>05. Under which of the following does your degree fall?</strong>
                    <input class="form-control" readonly value={{$survey->degreeFall}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>7.1. Name of the Degree Programme: EX: BSC Business Administration(Business Economics)(Honours):</strong>
                    <input class="form-control" readonly value={{$survey->degreeProgram}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>08. Degree type:</strong>
                    <input class="form-control" readonly value={{$survey->degreeType}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>8.1. If Special/Honours, please specify area of specialization: (EX: Economics):</strong>
                    <input class="form-control" readonly value={{$survey->specialization}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>09. Medium of Instruction:</strong>
                    <input class="form-control" readonly value={{$survey->medium}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>10. Class received:</strong>
                    <input class="form-control" readonly value={{$survey->classReceived}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>11. English Language Proficiency</strong>
                <div class="form-group">
                    <strong>11.1 The Grade you received for GCE(O/L) English Language:</strong>
                    <input class="form-control" readonly value={{$survey->olEnglish}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>11.2 The Grade you received for GCE(A/L) General English:</strong>
                    <input class="form-control" readonly value={{$survey->alEnglish}} >
                </div>
            </div>

            <strong>11.3 English language proficiency at the University Level(as per your own understanding):</strong>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Speaking Skills:</strong>
                    <input class="form-control" readonly value={{$survey->engSpeakSkill}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Listening Skills:</strong>
                    <input class="form-control" readonly value={{$survey->engListeningSkill}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>c. Writing Skills:</strong>
                    <input class="form-control" readonly value={{$survey->engWritingSkill}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>d. Reading Skills:</strong>
                    <input class="form-control" readonly value={{$survey->engReadingSkill}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>12. Your computer literacy (Mark with an “ √ ” to all that applies):</strong><br>
                    <textarea readonly class="form-control">{{$survey->computerLiteracy}}</textarea>
                     </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>13. Were you involved in any of the following during your university years?</strong>
                <table id="divFrmRegister" class="table table-bordered form-duration-div">
                    <tr>
                        <th></th>
                        <th>Yes/No</th>
                        <th>If yes, please specify</th>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td>1. Extra-curricular activities</td>
                            <td><input class="form-control" readonly value={{$survey->extraCurricular}}></td>
                            <td>
                                <input class="form-control" readonly value={{$survey->extraCurricularDes}} >
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td>2. Internships/Vocational training</td>
                            <td><input class="form-control" readonly value={{$survey->training}}></td>
                            <td>
                                <input class="form-control" readonly value={{$survey->trainingDes}}>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td>3. Other educational/professional qualifications</td>
                            <td><input class="form-control" readonly value={{$survey->qualifications}}></td>
                            <td>
                                <input class="form-control" readonly value={{$survey->qualificationsDes}}>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td>4. Full/part-time employment</td>
                            <td><input class="form-control" readonly value={{$survey->employment}}></td>
                            <td>
                                <input class="form-control" readonly value={{$survey->employmentDes}}>
                            </td>
                        </div>
                    </tr>
                </table>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>14. Which sort of area have you lived most of your life?</strong>
                    <input class="form-control" readonly value={{$survey->areaLive}}>
                </div>
            </div>

            <strong>15. Please indicate the area in Sri Lanka that you lived in for most of your life</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>District:</strong>
                    <input class="form-control" readonly value={{$survey->districtLife}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>AGA Division</strong>
                    <input class="form-control" readonly value={{$survey->agaDivision}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>16. What type of school did you go to for your GCE A/L?</strong>
                    <input class="form-control" readonly value={{$survey->alSchool}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>17. What is the highest level of education achieved by either your father and/or mother??</strong>
                    <input class="form-control" readonly value={{$survey->edumf}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>18. To what extent do you agree with the following statements?</strong>
                <table id="divFrmRegister" class="table table-bordered form-duration-div">
                    <tr>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <td>1. Teaching methods used at the university are effective</td>
                            <td><input class="form-control" readonly value={{$survey->teachingMethods}}></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>2. Learning process is suitable for current job environment</td>
                            <td><input class="form-control" readonly value={{$survey->learningProcess}}></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>3. The quality of lecturers/instructors is good</td>
                            <td><input class="form-control" readonly value={{$survey->qualityOfLec}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>4. The lab facilities provided are satisfactory</td>
                            <td><input class="form-control" readonly value={{$survey->labFacilities}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>5. The quality of classrooms is good</td>
                            <td><input class="form-control" readonly value={{$survey->qualityOfClassrooms}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>6. The library facilities are libraryFacilities</td>
                            <td><input class="form-control" readonly value={{$survey->libraryFacilities}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>7. IT facilities are satisfactory</td>
                            <td><input class="form-control" readonly value={{$survey->libraryFacilities	}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>8. Practical knowledge is acquired through course work</td>
                            <td><input class="form-control" readonly value={{$survey->itFacilities}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>9. Text books are used in courses taught</td>
                            <td><input class="form-control" readonly value={{$survey->textBooks}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>10. Tutorials are used as learning tools</td>
                            <td><input class="form-control" readonly value={{$survey->tutorials}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>11. Practical training is a part of the university education</td>
                            <td><input class="form-control" readonly value={{$survey->practicalTraining}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>12. Research skills are developed during the study period</td>
                            <td><input class="form-control" readonly value={{$survey->researchSkills}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>13. Learning is mostly done by memorizing the lecture notes</td>
                            <td><input class="form-control" readonly value={{$survey->lecNotes}}></td>

                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <td>14. Workload assigned is very high</td>
                            <td><input class="form-control" readonly value={{$survey->workload}}></td>

                        </div>
                    </tr>

                </table>

            </div>

            <strong>19. Indicate the names of the Lecturer / Professor(s) who have helped you most during your university education.</strong>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Quality communication at lectures or laboratories</strong>
                    <input class="form-control" readonly value={{$survey->qualityCommunication}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Helpful teaching material</strong>
                    <input class="form-control" readonly value={{$survey->helpfulTeachingMaterial}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>c. Promotion of interaction through group work</strong>
                    <input class="form-control" readonly value={{$survey->promotionOfInteraction}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>d. Assignment and feedback given</strong>
                    <input class="form-control" readonly value={{$survey->assignmentAndFeedback}} >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>e. Supervision of project work</strong>
                    <input class="form-control" readonly value={{$survey->supervisionOfProjectWork}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>f. Mentoring and being a role model</strong>
                    <input class="form-control" readonly value={{$survey->monitoringRoleModel}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>20. How much did you expect your gross monthly salary(In Rupees) to be after your university education?</strong>
                    <input class="form-control" readonly value={{$survey->monitoringRoleModel}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>21. Which of the following describes your situation after your university education?(Mark with an “ √ ” to all that applies)</strong><br>
                    <input class="form-control" readonly value={{$survey->situationAfterUniversityEduction}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>22. When was your last university exam?</strong>
                    <input class="form-control" readonly value={{$survey->lastExamDate}}>
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>23. Which sector(s) are you willing to be employed in? (Mark to all that applies)</strong><br>
                    <textarea readonly class="form-control">{{$survey->sectorsWillingEmployee}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>24. Were you employed at any point after your last exam?</strong>
                    <input class="form-control" readonly value={{$survey->employedAfterLastExam}}>
                </div>
            </div>

            <strong>If Yes</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. How long did you wait to get your first job after the last day of final exam? (Please enter the number of months)</strong>
                    <input class="form-control" readonly value={{$survey->waitedDaysForFirstJob}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. What is the date of your first appointment?</strong>
                    <input class="form-control" readonly value={{$survey->firstAppointment}}>
                </div>
            </div>





            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>25. What is your current employment status?</strong>
                    <input class="form-control" readonly value={{$survey->currentEmploymentStatus}}>
                </div>
            </div>

            <hr/>

            <div class="pull-left">
                <h5 style="font-weight: bold">Answer question 26-37 ONLY if you are currently Permanent/Temporary/Contract employed or Self employed otherwise skip to question 37</h5>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>26. Type of employment</strong>
                    <input class="form-control" readonly value={{$survey->typeEmployemt}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>27. Name of the organization currently employed:</strong>
                    <input class="form-control" readonly value={{$survey->organizationCurrentlyEmployed}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>28. Which sector are you employed in?</strong>
                    <input class="form-control" readonly value={{$survey->sectorEmployed}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>29. The position you hold currently?</strong>
                    <input class="form-control" readonly value={{$survey->currentPosition}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>30. To which economic sector does your current job belong to?</strong>
                    <input  class="form-control" readonly value={{$survey->jobEconomicSector}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>31. What is your current gross monthly salary (In Rupees)?</strong>
                    <input class="form-control" readonly value={{$survey->currentGrossMonthlySalary}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>32. How did you find this job?</strong>
                    <input class="form-control" readonly value={{$survey->findTheJob}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>33. What do you think were the most important aspects in getting this job? (Check all that applies)</strong><Br>
                    <input class="form-control" readonly value={{$survey->aspectsInGettingJob}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>34. Is this job related to the field you studies in your degree?</strong>
                    <input class="form-control" readonly value={{$survey->jobRelatedDegree}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>35. When did you find your current job?</strong>
                    <input class="form-control" readonly value={{$survey->whenFIndCurrentJob}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>36. How satisfied are you with your current job?</strong>
                    <input class="form-control" readonly value={{$survey->satisfiedCurrentJob}}>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>37. How long have you been waited to get this job since the effecive date of your degree?</strong>
                    <input class="form-control" readonly value={{$survey->howLongWaitedToGetJob}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>38. Are looking for employment right now?</strong>
                    <input class="form-control" readonly value={{$survey->lookingNowEmployee}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>If no, please indicate the reason(s) and skip to 40)</strong>
                    <input class="form-control" readonly value={{$survey->indicateReason}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>39. What do you think are the main obstacles for you to get a job? Please give details</strong>
                    <input  class="form-control" readonly value={{$survey->obstaclesForJob}}>
                </div>
            </div>


            <strong>40. Are you willing to do any of the following in order to find a job?</strong>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>a. Accept a job that is not in the field you stuied at the university</strong>
                    <input class="form-control" readonly value={{$survey->willingToFindJob}}>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>b. Move if a job requires it</strong>
                    <input class="form-control" readonly value={{$survey->jobRequest}} >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>c. Accept a job that you are over-qualified for</strong>
                    <input class="form-control" readonly value={{$survey->jobOverQualified}} >
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>41. What are the career goals for the next two years? (Mark with to all that applies)</strong><Br>
                    <textarea class="form-control" readonly>{{$survey->careerGoalsNextTwoYears}}</textarea>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>42. How satisfied are you with your university education?</strong>
                    <input class="form-control" readonly value={{$survey->universityEducation}} >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>43. What do you think could be done to facilitate the first employment after graduation?</strong>
                    <input class="form-control" readonly value={{$survey->employmentAfterGraduation}} >
                </div>
            </div>

            {{--            =======================--}}



        </div>
    </div>

    @endif

@endsection
