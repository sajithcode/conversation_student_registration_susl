<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
        }
        .university-name {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }
        .document-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .details-grid {
            display: table;
            width: 100%;
        }
        .details-row {
            display: table-row;
        }
        .label {
            display: table-cell;
            font-weight: bold;
            padding: 8px 15px 8px 0;
            width: 40%;
            vertical-align: top;
        }
        .value {
            display: table-cell;
            padding: 8px 0;
            vertical-align: top;
        }
        .status-pending {
            color: #ffc107;
            font-weight: bold;
        }
        .status-accept {
            color: #28a745;
            font-weight: bold;
        }
        .status-reject {
            color: #dc3545;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .qr-section {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="university-name">Sabaragamuwa University of Sri Lanka</div>
        <div class="document-title">Student Convocation Registration Details</div>
    </div>

    <div class="section">
        <div class="section-title">Personal Information</div>
        <div class="details-grid">
            <div class="details-row">
                <div class="label">Name with Initials:</div>
                <div class="value">{{ $studentRegistration->nameWithInitial }}</div>
            </div>
            <div class="details-row">
                <div class="label">Full Name (English Block):</div>
                <div class="value">{{ $studentRegistration->fullNameInEnglishBlock }}</div>
            </div>
            <div class="details-row">
                <div class="label">Full Name (Sinhala):</div>
                <div class="value">{{ $studentRegistration->fullNameInSinhala }}</div>
            </div>
            <div class="details-row">
                <div class="label">Gender:</div>
                <div class="value">{{ $studentRegistration->gender }}</div>
            </div>
            <div class="details-row">
                <div class="label">NIC:</div>
                <div class="value">{{ $studentRegistration->nic }}</div>
            </div>
            <div class="details-row">
                <div class="label">Address:</div>
                <div class="value">{{ $studentRegistration->address }}</div>
            </div>
            <div class="details-row">
                <div class="label">Mobile Number:</div>
                <div class="value">{{ $studentRegistration->mobileNumber }}</div>
            </div>
            <div class="details-row">
                <div class="label">Email:</div>
                <div class="value">{{ $studentRegistration->email }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Academic Information</div>
        <div class="details-grid">
            <div class="details-row">
                <div class="label">Faculty:</div>
                <div class="value">{{ $studentRegistration->faculty }}</div>
            </div>
            <div class="details-row">
                <div class="label">Department:</div>
                <div class="value">{{ $studentRegistration->department }}</div>
            </div>
            <div class="details-row">
                <div class="label">Degree Name:</div>
                <div class="value">{{ $studentRegistration->degreeName }}</div>
            </div>
            <div class="details-row">
                <div class="label">Registration Number:</div>
                <div class="value">{{ $studentRegistration->regNum }}</div>
            </div>
            <div class="details-row">
                <div class="label">Index Number:</div>
                <div class="value">{{ $studentRegistration->indexNum }}</div>
            </div>
            <div class="details-row">
                <div class="label">Month & Year of Examination:</div>
                <div class="value">{{ $studentRegistration->monthAndYearExamination }}</div>
            </div>
            <div class="details-row">
                <div class="label">Degree Class:</div>
                <div class="value">{{ $studentRegistration->degreeClass }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Convocation Details</div>
        <div class="details-grid">
            <div class="details-row">
                <div class="label">Convocation Name:</div>
                <div class="value">{{ $studentRegistration->convocationName }}</div>
            </div>
            <div class="details-row">
                <div class="label">Attendance:</div>
                <div class="value">{{ $studentRegistration->attendance }}</div>
            </div>
            <div class="details-row">
                <div class="label">Registration Status:</div>
                <div class="value">
                    <span class="status-{{ strtolower($studentRegistration->status) }}">
                        {{ ucfirst($studentRegistration->status) }}
                    </span>
                </div>
            </div>
            @if($studentRegistration->statusMessage)
            <div class="details-row">
                <div class="label">Status Message:</div>
                <div class="value">{{ $studentRegistration->statusMessage }}</div>
            </div>
            @endif
            <div class="details-row">
                <div class="label">Registration Date:</div>
                <div class="value">{{ $studentRegistration->signedDate ?? $studentRegistration->created_at->format('Y-m-d') }}</div>
            </div>
        </div>
    </div>

    @if($studentRegistration->nameVisitor1 || $studentRegistration->nameVisitor2)
    <div class="section">
        <div class="section-title">Visitor Information</div>
        <div class="details-grid">
            @if($studentRegistration->nameVisitor1)
            <div class="details-row">
                <div class="label">Visitor 1 Name:</div>
                <div class="value">{{ $studentRegistration->nameVisitor1 }}</div>
            </div>
            <div class="details-row">
                <div class="label">Visitor 1 NIC:</div>
                <div class="value">{{ $studentRegistration->nicVisitor1 }}</div>
            </div>
            @endif
            @if($studentRegistration->nameVisitor2)
            <div class="details-row">
                <div class="label">Visitor 2 Name:</div>
                <div class="value">{{ $studentRegistration->nameVisitor2 }}</div>
            </div>
            <div class="details-row">
                <div class="label">Visitor 2 NIC:</div>
                <div class="value">{{ $studentRegistration->nicVisitor2 }}</div>
            </div>
            @endif
        </div>
    </div>
    @endif

    <div class="qr-section">
        <p><strong>QR Code for Verification:</strong></p>
        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate(route('studentRegistration.show', $studentRegistration->id)) !!}
    </div>

    <div class="footer">
        <p>This document was generated on {{ date('Y-m-d H:i:s') }}</p>
        <p>Sabaragamuwa University of Sri Lanka - Student Registration System</p>
    </div>
</body>
</html>
