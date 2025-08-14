@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fas fa-clipboard-list"></i> Complete Survey</h4>
                </div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-clipboard-check fa-5x text-primary mb-3"></i>
                        <h5>Complete the Survey</h5>
                        <p class="text-muted">
                            Please complete the Google Form survey by following the steps below.
                        </p>
                        
                        <div class="alert alert-info text-left">
                            <h6><i class="fas fa-info-circle"></i> Instructions:</h6>
                            <ol class="mb-0">
                                <li>Click the "Open Google Form Survey" button below</li>
                                <li>Complete and submit the survey in the new tab</li>
                                <li>Return to this page</li>
                                <li>Click "I Have Completed the Survey" button</li>
                            </ol>
                        </div>
                        
                        <div class="mb-3">
                            <a href="https://forms.gle/GHfDEB253DfGG6LM9" target="_blank" class="btn btn-primary btn-lg" id="openSurveyBtn">
                                <i class="fas fa-external-link-alt"></i> Open Google Form Survey
                            </a>
                        </div>
                    </div>

                    <div class="border-top pt-4">
                        <h6 class="text-muted mb-3">After completing the survey, click below:</h6>
                        
                        <form action="{{ route('markSurveyCompleted') }}" method="POST" onsubmit="return confirmSurveyCompletion()">
                            @csrf
                            <input type="hidden" name="regNum" value="{{ Auth::user()->regNum }}">
                            
                            <div class="alert alert-secondary">
                                <strong>Registration Number:</strong> {{ Auth::user()->regNum }}<br>
                                <strong>Name:</strong> {{ Auth::user()->name }}
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success btn-lg" id="confirmBtn">
                                    <i class="fas fa-check"></i> I Have Completed the Survey
                                </button>
                            </div>
                        </form>

                        <div class="mt-3">
                            <a href="{{ route('eligibleStd') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Registration Page
                            </a>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning mt-4">
                        <small>
                            <strong>Important:</strong> Only click "I Have Completed the Survey" if you have actually 
                            completed and submitted the Google Form survey. This action will mark your 
                            survey as completed in our system.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmSurveyCompletion() {
    return confirm('Have you completed and submitted the Google Form survey?\n\nClick OK only if you have successfully submitted the survey.');
}

// Track if user clicked on survey link
document.getElementById('openSurveyBtn').addEventListener('click', function() {
    document.getElementById('confirmBtn').style.backgroundColor = '#28a745';
    document.getElementById('confirmBtn').style.borderColor = '#28a745';
});
</script>
@endsection
